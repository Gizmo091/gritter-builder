<?php
/**
 * Projet :  GritterBuilder
 * User: mvedie
 * Date: 01/06/2017
 * Time: 17:26
 */


namespace JBoesch\Gritter;


final class GritterFactory {
	
	/**
	 * Initialize un GritterOptions de Type Warning
	 *
	 * @param string $title
	 * @param string $text
	 *
	 * @return GritterOptions
	 */
	public static function warning( string $text = null, string $title = null  ) {
		return ( new GritterOptions('gritter-warning') )->title( $title )->text( $text );
	}
	
	/**
	 * Initialize un GritterOptions de Type Info
	 *
	 * @param string $title
	 * @param string $text
	 *
	 * @return GritterOptions
	 */
	public static function info( string $text = null, string $title = null  ) {
		return ( new GritterOptions('gritter-info') )->title( $title )->text( $text );
	}
	
	/**
	 * Initialize un GritterOptions de Type Error
	 *
	 * @param string $title
	 * @param string $text
	 *
	 * @return GritterOptions
	 */
	public static function error( string $text = null, string $title = null  ) {
		return ( new GritterOptions('gritter-error') )->title( $title )->text( $text );
	}
	
	/**
	 * Initialize un GritterOptions de Type Success
	 *
	 * @param string $title
	 * @param string $text
	 *
	 * @return GritterOptions
	 */
	public static function success( string $text = null, string $title = null  ) {
		return ( new GritterOptions('gritter-success') )->title( $title )->text( $text );
	}
	
	
	/**
	 * Initialize un GritterOptions de Type Light
	 *
	 * @param string $title
	 * @param string $text
	 *
	 * @return GritterOptions
	 */
	public static function light( string $text = null, string $title = null  ) {
		return ( new GritterOptions('') )->title( $title )->text( $text )->lighten();
	}
}




