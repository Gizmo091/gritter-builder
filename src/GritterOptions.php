<?php
/**
 * Projet :  GritterBuilder
 * User: mvedie
 * Date: 01/06/2017
 * Time: 17:26
 */


namespace JBoesch\Gritter;

final class GritterOptions implements \JsonSerializable {
	const TIME     = 6000;
	const FADE_IN  = 'medium';
	const FADE_OUT = 'medium';
	/** @var  string|null */
	private $title;
	/** @var  string|null */
	private $text;
	/** @var  string|null */
	private $image;
	/** @var  bool */
	private $sticky;
	/** @var  int */
	private $time;
	/** @var  string */
	private $class_name;
	/** @var  int|string */
	private $fade_in_speed;
	/** @var int|string */
	private $fade_out_speed;
	/** @var  string */
	private $position;
	
	public function __construct( string $type = 'gritter-info' ) {
		$this->title          = null;
		$this->text           = null;
		$this->image          = null;
		$this->sticky         = false;
		$this->time           = self::TIME;
		$this->class_name     = [
			'type'     => $type,
			'variante' => '',
		];
		$this->fade_in_speed  = 'medium';
		$this->fade_out_speed = 'medium';
		$this->position       = 'top-right';
	}
	
	/**
	 * Set le texte du Gritter
	 *
	 * @param null|string $text
	 *
	 * @return GritterOptions
	 */
	public function text( string $text = null ) {
		$this->text = $text ?? '';
		
		return $this;
	}
	
	/**
	 * Set le titre du GritterOptions
	 *
	 * @param null|string $title
	 *
	 * @return GritterOptions
	 */
	public function title( string $title = null ) {
		$this->title = $title ?? '';
		
		return $this;
	}
	
	/**
	 * Set l'image du GritterOptions
	 *
	 * @param string|null $image
	 *
	 * @return $this
	 */
	public function image( string $image = null ) {
		$this->image = $image;
		
		return $this;
	}
	
	/**
	 * Defini que le GritterOptions sera stické
	 *
	 * @return GritterOptions
	 */
	public function stick() {
		return $this->setSticky( true );
	}
	
	/**
	 * Defini que le GritterOptions ne sera pas stické
	 *
	 * @return GritterOptions
	 */
	public function unstick() {
		return $this->setSticky( false );
	}
	
	/**
	 * Setteur de la donnée sticky
	 *
	 * @param bool $sticky
	 *
	 * @return GritterOptions
	 */
	private function setSticky( bool $sticky ) {
		$this->sticky = $sticky;
		
		return $this;
	}
	
	/**
	 * Set le time du GritterOptions
	 * C'est le temps pendant lequel le GritterOptions sera visible
	 *
	 * @param int $time
	 *
	 * @return $this
	 */
	public function time( int $time = null ) {
		$time       = $time ?? self::TIME;
		$this->time = abs( $time );
		
		return $this;
	}
	
	/**
	 * Set le gritter avec son style de couleur legere
	 *
	 * @return GritterOptions
	 */
	public function lighten() {
		return $this->setVariante( 'gritter-light' );
	}
	
	/**
	 * Setteur interne de la class variante
	 *
	 * @param string $variante
	 *
	 * @return GritterOptions
	 */
	private function setVariante( string $variante ) {
		$this->class_name[ 'variante' ] = $variante;
		
		return $this;
	}
	
	/**
	 * Indique que le GritterOptions sera dans le coin en haut a gauche
	 *
	 * @return GritterOptions
	 */
	public function topLeft() {
		return $this->setPosition( 'top-left' );
	}
	
	/**
	 * Indique que le GritterOptions sera dans le coin en haut a droite
	 *
	 * @return GritterOptions
	 */
	public function topRight() {
		return $this->setPosition( 'top-right' );
	}
	
	/**
	 * Indique que le GritterOptions sera dans le coin en bas a droite
	 *
	 * @return GritterOptions
	 */
	public function bottomRight() {
		return $this->setPosition( 'bottom-right' );
	}
	
	/**
	 * Indique que le GritterOptions sera dans le coin en bas a gauche
	 *
	 * @return GritterOptions
	 */
	public function bottomLeft() {
		return $this->setPosition( 'bottom-left' );
	}
	
	/**
	 * Indique que le GritterOptions sera centré
	 *
	 * @return GritterOptions
	 */
	public function center() {
		return $this->setPosition( 'gritter-center' );
	}
	
	/**
	 * Setteur interne de la position du GritterOptions
	 *
	 * @param string $position String de la position
	 *
	 * @return GritterOptions
	 */
	private function setPosition( string $position ) {
		$this->position = $position;
		
		return $this;
	}
	
	/**
	 * Set la vitesse d'apparition du GritterOptions
	 *
	 * @param $fade_in
	 *
	 * @return GritterOptions
	 */
	public function fadeIn( $fade_in ) {
		if ( is_string( $fade_in )
			 && !in_array( $fade_in, [
				'slow',
				'medium',
				'fast',
			] )
		) {
			$fade_in = self::FADE_IN;
		}
		else {
			$fade_in = abs( $fade_in );
		}
		
		$this->fade_in_speed = $fade_in;
		
		return $this;
	}
	
	/**
	 * Set la vitesse de disparition du GritterOptions
	 *
	 * @param $fade_out
	 *
	 * @return GritterOptions
	 */
	public function fadeOut( $fade_out ) {
		if ( is_string( $fade_out )
			 && !in_array( $fade_out, [
				'slow',
				'medium',
				'fast',
			] )
		) {
			$fade_out = self::FADE_OUT;
		}
		else {
			$fade_out = abs( $fade_out );
		}
		
		$this->fade_out_speed = $fade_out;
		
		return $this;
	}
	
	/**
	 * Ajoute une classe au gritter
	 *
	 * @param string $class
	 *
	 * @return $this
	 */
	public function addClass( string $class ) {
		$this->class_name[] = $class;
		
		return $this;
	}
	
	/**
	 * Specify data which should be serialized to JSON
	 *
	 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 *        which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
		$json = [
			'sticky'         => $this->sticky,
			'time'           => $this->time,
			'class_name'     => implode( ' ', array_filter( $this->class_name ) ),
			'fade_in_speed'  => $this->fade_in_speed,
			'fade_out_speed' => $this->fade_out_speed,
			'position'       => $this->position,
		];
		
		if ( $this->title ) {
			$json[ 'title' ] = $this->title;
		}
		if ( $this->text ) {
			$json[ 'text' ] = $this->text;
		}
		if ( $this->image ) {
			$json[ 'image' ] = $this->image;
		}
		
		return $json;
	}
}
