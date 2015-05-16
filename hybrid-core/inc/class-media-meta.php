<?php
/**
 * Media metadata class. This class is for getting and formatting attachment media file metadata. This 
 * is for metadata about the actual file and not necessarily any post metadata.  Currently, only 
 * image, audio, and video files are handled.
 *
 * Theme authors need not access this class directly.  Instead, utilize the template tags in the 
 * `/inc/template-media.php` file.
 *
 * @package    Hybrid
 * @subpackage Includes
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Gets attachment media file metadata.  Each piece of meta will be escaped and formatted when 
 * returned so that theme authors can properly utilize it within their themes.
 *
 * Theme authors shouldn't access this class directly.  Instead, utilize the `hybrid_media_meta()` 
 * and `hybrid_get_media_meta()` functions.
 *
 * @since  3.0.0
 * @access public
 */
class Hybrid_Media_Meta {

	/**
	 * Arguments passed in.
	 *
	 * @since  3.0.0
	 * @access protected
	 * @var    array
	 */
	protected $post_id  = 0;

	/**
	 * Metadata from the wp_get_attachment_metadata() function.
	 *
	 * @since  3.0.0
	 * @access protected
	 * @var    array
	 */
	protected $meta  = array();

	/* ====== Magic Methods ====== */

	/**
	 * Sets up and runs the functionality for getting the attachment meta.
	 *
	 * @since  3.0.0
	 * @access public
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $post_id ) {

		$this->post_id  = $post_id;
		$this->meta     = wp_get_attachment_metadata( $this->post_id );

		/* If the attachment is an image. */
		if ( wp_attachment_is_image( $this->post_id ) )
			$this->set_image_meta();

		/* If the attachment is audio. */
		elseif ( hybrid_attachment_is_audio( $this->post_id ) )
			$this->set_audio_meta();

		/* If the attachment is video. */
		elseif ( hybrid_attachment_is_video( $this->post_id ) )
			$this->set_video_meta();
	}

	/**
	 * Magic method for getting media object properties.  Let's keep from failing if a theme 
	 * author attempts to access a property that doesn't exist.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return mixed
	 */
	public function __get( $property ) {

		return isset( $this->$property ) ? $this->$property : null;
	}

	/* ====== Public Methods ====== */

	/**
	 * Adds and formats image metadata for the items array.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_image_meta() {

		$this->set_dimensions();
		$this->set_created_timestamp();
		$this->set_camera();
		$this->set_aperture();
		$this->set_focal_length();
		$this->set_iso();
		$this->set_shutter_speed();
		$this->set_file_name();
		$this->set_file_size();
		$this->set_file_type();
		$this->set_mime_type();
	}

	/**
	 * Adds and formats audio metadata for the items array.
	 *
	 * Note that we're purposely leaving out the "transcript/lyrics" metadata in this instance.  This 
	 * is because it doesn't fit in well with how other metadata works on display.  There's a separate 
	 * function for that called `hybrid_get_audio_transcript()`.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_audio_meta() {

		/* Filters for the audio transcript. */
		add_filter( 'hybrid_audio_transcript', 'wptexturize',   10 );
		add_filter( 'hybrid_audio_transcript', 'convert_chars', 20 );
		add_filter( 'hybrid_audio_transcript', 'wpautop',       25 );

		$this->set_length_formatted();
		$this->set_lyrics();
		$this->set_artist();
		$this->set_composer();
		$this->set_album();
		$this->set_track_number();
		$this->set_year();
		$this->set_genre();
		$this->set_file_name();
		$this->set_file_size();
		$this->set_file_type();
		$this->set_mime_type();
	}

	/**
	 * Adds and formats video meta data for the items array.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_video_meta() {

		$this->set_length_formatted();
		$this->set_dimensions();
		$this->set_file_name();
		$this->set_file_size();
		$this->set_file_type();
		$this->set_mime_type();
	}

	/**
	 * Image/Video meta. Media width + height dimensions.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_dimensions() {

		/* If there's a width and height. */
		if ( !empty( $this->meta['width'] ) && !empty( $this->meta['height'] ) ) {

			/* Translators: Media dimensions - 1 is width and 2 is height. */
			$dimensions = sprintf(
				esc_html__( '%1$s &#215; %2$s', 'hybrid-core' ),
				number_format_i18n( absint( $this->meta['width'] ) ), 
				number_format_i18n( absint( $this->meta['height'] ) )
			);

			$this->dimensions = sprintf( '<a href="%s">%s</a>', esc_url( wp_get_attachment_url() ), $dimensions );
		}
	}

	/**
	 * Image meta.  Date the image was created.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_created_timestamp() {

		if ( !empty( $this->meta['image_meta']['created_timestamp'] ) ) {

			$this->date = $this->created_timestamp = date_i18n(
				get_option( 'date_format' ),
				strip_tags( $this->meta['image_meta']['created_timestamp'] )
			);
		}
	}

	/**
	 * Image meta.  Name of the camera used to capture the image.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_camera() {

		if ( !empty( $this->meta['image_meta']['camera'] ) )
			$this->camera = esc_html( $this->meta['image_meta']['camera'] );
	}

	/**
	 * Image meta.  Camera aperture in the form of `f/{$aperture}`.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_aperture() {

		if ( !empty( $this->meta['image_meta']['aperture'] ) )
			$this->aperture = sprintf( '<sup>f</sup>&#8260;<sub>%s</sub>', absint( $this->meta['image_meta']['aperture'] ) );
	}

	/**
	 * Image meta. Camera focal length in millimeters.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_focal_length() {

		if ( !empty( $this->meta['image_meta']['focal_length'] ) )
			$this->focal_length = absint( $this->meta['image_meta']['focal_length'] );
	}

	/**
	 * Image meta. ISO metadata for image.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_iso() {

		if ( !empty( $this->meta['image_meta']['iso'] ) )
			$this->iso = absint( $this->meta['image_meta']['iso'] );
	}

	/**
	 * Image meta. Camera shutter speed in seconds (i18n number format).
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_shutter_speed() {

		/* If a shutter speed is given, format the float into a fraction and add it to the $items array. */
		if ( !empty( $this->meta['image_meta']['shutter_speed'] ) ) {

			$out = $speed = floatval( strip_tags( $this->meta['image_meta']['shutter_speed'] ) );

			if ( ( 1 / $speed ) > 1 ) {
				$out = sprintf( '<sup>%s</sup>&#8260;', number_format_i18n( 1 ) );

				if ( number_format( ( 1 / $speed ), 1 ) ==  number_format( ( 1 / $speed ), 0 ) )
					$out .= sprintf( '<sub>%s</sub>', number_format_i18n( ( 1 / $speed ), 0, '.', '' ) );

				else
					$out .= sprintf( '<sub>%s</sub>', number_format_i18n( ( 1 / $speed ), 1, '.', '' ) );
			}

			$this->shutter_speed = $out;
		}
	}

	/**
	 * Audio/Video meta. The "run time" of a file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_length_formatted() {

		if ( !empty( $this->meta['length_formatted'] ) )
			$this->length_formatted = esc_html( $this->meta['length_formatted'] );
	}

	/**
	 * Audio meta. Lyrics/transcript for an audio file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_lyrics() {

		/* Look for the 'unsynchronised_lyric' tag. */
		if ( isset( $this->meta['unsynchronised_lyric'] ) )
			$this->lyrics = $this->meta['unsynchronised_lyric'];

		/* Seen this misspelling of the id3 tag. */
		elseif ( isset( $this->meta['unsychronised_lyric'] ) )
			$this->lyrics = $this->meta['unsychronised_lyric'];

		/* Apply filters for the transcript. */
		$this->lyrics = apply_filters( 'hybrid_audio_transcript', $this->lyrics );
	}

	/**
	 * Audio meta. Name of the artist.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_artist() {

		if ( !empty( $this->meta['artist'] ) )
			$this->artist = esc_html( $this->meta['artist'] );
	}

	/**
	 * Audio meta. Name of the composer.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_composer() {

		if ( !empty( $this->meta['composer'] ) )
			$this->composer = esc_html( $this->meta['composer'] );
	}

	/**
	 * Audio meta. Name of the album.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_album() {

		if ( !empty( $this->meta['album'] ) )
			$this->album = esc_html( $this->meta['album'] );
	}

	/**
	 * Audio meta. Track number for the `$album`.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_track_number() {

		if ( !empty( $this->meta['track_number'] ) )
			$this->track_number = absint( $this->meta['track_number'] );
	}

	/**
	 * Audio meta. Year the album was released.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return int
	 */
	public function set_year() {

		if ( !empty( $this->meta['year'] ) )
			$this->year = absint( $this->meta['year'] );
	}

	/**
	 * Audio meta. Genre the audio file belongs to.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_genre() {

		if ( !empty( $this->meta['genre'] ) )
			$this->genre = esc_html( $this->meta['genre'] );
	}

	/**
	 * Name of the file linked to the permalink for the file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_file_name() {

		$this->file_name = sprintf(
			'<a href="%s">%s</a>',
			esc_url( wp_get_attachment_url( $this->post_id ) ),
			basename( get_attached_file( $this->post_id ) )
		);
	}

	/**
	 * Audio/Video meta. Size of the file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_file_size() {

		if ( !empty( $this->meta['filesize'] ) )
			$this->file_size = $this->filesize = size_format( strip_tags( $this->meta['filesize'] ), 2 );
	}

	/**
	 * Type of file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_file_type() {

		if ( preg_match( '/^.*?\.(\w+)$/', get_attached_file( $this->post_id ), $matches ) )
			$this->file_type = esc_html( strtoupper( $matches[1] ) );
	}

	/**
	 * Mime type for the file.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function set_mime_type() {

		$mime = get_post_mime_type( $this->post_id );

		if ( !empty( $mime ) )
			$this->mime_type = esc_html( $mime );

		elseif ( !empty( $this->meta['mime_type'] ) )
			$this->mime_type = esc_html( $this->meta['mime_type'] );
	}
}
