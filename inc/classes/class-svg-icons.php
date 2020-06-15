<?php
/**
 * SVG Icons class
 *
 * @package Onclinic
 * @since 1.0.0
 */

/**
 * This class is in charge of displaying SVG icons across the site.
 *
 * Place each <svg> source on its own array key, without adding the
 * both `width` and `height` attributes, since these are added dynamically,
 * before rendering the SVG code.
 *
 * All icons are assumed to have equal width and height, hence the option
 * to only specify a `$size` parameter in the svg methods.
 *
 * @since 1.0.0
 */
class Onclinic_SVG_Icons {

	/**
	 * Gets the SVG code for a given icon.
	 *
	 * @since  1.0.0
	 * @param  string $icon          Icon name.
	 * @param  array|string $classes Additional CSS classes
	 * @return null|string
	 */
	public static function get_svg( $icon = '', $classes = array() ) {
		$arr = self::$ui_icons;

		$classes   = (array) $classes;
		$classes[] = 'svg-icon';

		if ( array_key_exists( $icon, $arr ) ) {
			$repl = sprintf( '<svg class="%s" aria-hidden="true" role="img" focusable="false" ', join( ' ', $classes ) );
			$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
			$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
			$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.

			return $svg;
		}

		return null;
	}

	/**
	 * User Interface icons – svg sources.
	 *
	 * @since 1.0.0
	 * @var   array
	 */
	static $ui_icons = array(
		'arrow-right' 	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M9.29688 0L7.90625 1.46853L12.2031 5.95571H0V8.04429H12.2031L7.90625 12.5315L9.29688 14L16 7L9.29688 0Z"/></svg>',
		'arrow-left' 	=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M6.70312 14L8.09375 12.5315L3.79688 8.04429H16V5.95571H3.79688L8.09375 1.46853L6.70312 0L0 7L6.70312 14Z"/></svg>',
		'search' 		=> '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0search)"><path d="M8.11757 0C12.5936 0 16.2351 3.64155 16.2351 8.11757C16.2351 9.70382 15.7775 11.185 14.9877 12.4366L17.4716 14.9206C18.1761 15.625 18.1761 16.7672 17.4716 17.4716C16.7671 18.1761 15.625 18.1761 14.9206 17.4716L12.4366 14.9877C11.1849 15.7775 9.70375 16.2351 8.11757 16.2351C3.64155 16.2351 0 12.5936 0 8.11757C0 3.64155 3.64148 0 8.11757 0ZM8.11757 14.4312C11.5989 14.4312 14.4312 11.5989 14.4312 8.11757C14.4312 4.63623 11.599 1.8039 8.11757 1.8039C4.63619 1.8039 1.8039 4.63623 1.8039 8.11757C1.8039 11.5989 4.63616 14.4312 8.11757 14.4312Z" fill="white"/></g><defs><clipPath id="clip0search"><rect width="18" height="18" fill="white"/></clipPath></defs></svg>',
        'search_black' 		=> '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0searchblack)"><path d="M8.11757 0C12.5936 0 16.2351 3.64155 16.2351 8.11757C16.2351 9.70382 15.7775 11.185 14.9877 12.4366L17.4716 14.9206C18.1761 15.625 18.1761 16.7672 17.4716 17.4716C16.7671 18.1761 15.625 18.1761 14.9206 17.4716L12.4366 14.9877C11.1849 15.7775 9.70375 16.2351 8.11757 16.2351C3.64155 16.2351 0 12.5936 0 8.11757C0 3.64155 3.64148 0 8.11757 0ZM8.11757 14.4312C11.5989 14.4312 14.4312 11.5989 14.4312 8.11757C14.4312 4.63623 11.599 1.8039 8.11757 1.8039C4.63619 1.8039 1.8039 4.63623 1.8039 8.11757C1.8039 11.5989 4.63616 14.4312 8.11757 14.4312Z" fill="#1E306E"/></g><defs><clipPath id="clip0searchblack"><rect width="18" height="18" fill="white"/></clipPath></defs></svg>',
		'close' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6607 0.339286C15.4345 0.113095 15.1667 0 14.8571 0C14.5476 0 14.2798 0.113095 14.0536 0.339286L8 6.39286L1.94643 0.339286C1.72024 0.113095 1.45238 0 1.14286 0C0.833333 0 0.565476 0.113095 0.339286 0.339286C0.113095 0.565476 0 0.833333 0 1.14286C0 1.45238 0.113095 1.72024 0.339286 1.94643L6.39286 8L0.339286 14.0536C0.113095 14.2798 0 14.5476 0 14.8571C0 15.1667 0.113095 15.4345 0.339286 15.6607C0.446429 15.7798 0.571429 15.869 0.714286 15.9286C0.857143 15.9762 1 16 1.14286 16C1.28571 16 1.42857 15.9762 1.57143 15.9286C1.71429 15.869 1.83929 15.7798 1.94643 15.6607L8 9.60714L14.0536 15.6607C14.1607 15.7798 14.2857 15.869 14.4286 15.9286C14.5714 15.9762 14.7143 16 14.8571 16C15 16 15.1429 15.9762 15.2857 15.9286C15.4286 15.869 15.5536 15.7798 15.6607 15.6607C15.8869 15.4345 16 15.1667 16 14.8571C16 14.5476 15.8869 14.2798 15.6607 14.0536L9.60714 8L15.6607 1.94643C15.8869 1.72024 16 1.45238 16 1.14286C16 0.833333 15.8869 0.565476 15.6607 0.339286Z"/></svg>',
		'sticky' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M298.028 214.267L285.793 96H328c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v48c0 13.255 10.745 24 24 24h42.207L85.972 214.267C37.465 236.82 0 277.261 0 328c0 13.255 10.745 24 24 24h136v104.007c0 1.242.289 2.467.845 3.578l24 48c2.941 5.882 11.364 5.893 14.311 0l24-48a8.008 8.008 0 0 0 .845-3.578V352h136c13.255 0 24-10.745 24-24-.001-51.183-37.983-91.42-85.973-113.733z"></path></svg>',
		'cart' 			=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.0386 3H4.51157L4.01028 0.796875C3.95806 0.546875 3.83796 0.354167 3.64998 0.21875C3.47244 0.0729167 3.25835 0 3.00771 0H0V2H2.20879L4.01028 10.2031C4.0625 10.4531 4.17738 10.651 4.35491 10.7969C4.5429 10.9323 4.76221 11 5.01285 11H13.0334C13.2318 11 13.4198 10.9323 13.5974 10.7969C13.7749 10.6615 13.8898 10.4948 13.942 10.2969L15.9471 4.29688C16.0411 4.04688 16.0098 3.77083 15.8531 3.46875C15.7069 3.15625 15.4354 3 15.0386 3ZM7.01799 14C7.01799 14.5521 6.81956 15.0208 6.42271 15.4062C6.03631 15.8021 5.56635 16 5.01285 16C4.45935 16 3.98417 15.8021 3.58732 15.4062C3.20091 15.0208 3.00771 14.5521 3.00771 14C3.00771 13.4479 3.20091 12.9792 3.58732 12.5938C3.98417 12.1979 4.45935 12 5.01285 12C5.56635 12 6.03631 12.1979 6.42271 12.5938C6.81956 12.9792 7.01799 13.4479 7.01799 14ZM15.0386 14C15.0386 14.5521 14.8401 15.0208 14.4433 15.4062C14.0569 15.8021 13.5869 16 13.0334 16C12.4799 16 12.0047 15.8021 11.6079 15.4062C11.2215 15.0208 11.0283 14.5521 11.0283 14C11.0283 13.4479 11.2215 12.9792 11.6079 12.5938C12.0047 12.1979 12.4799 12 13.0334 12C13.5869 12 14.0569 12.1979 14.4433 12.5938C14.8401 12.9792 15.0386 13.4479 15.0386 14Z"/></svg>',
		'login' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m512 60v392c0 33.085938-26.914062 60-60 60h-241c-33.085938 0-60-26.914062-60-60v-80h40v80c0 11.027344 8.972656 20 20 20h241c11.027344 0 20-8.972656 20-20v-392c0-11.027344-8.972656-20-20-20h-241c-11.027344 0-20 8.972656-20 20v80h-40v-80c0-33.085938 26.914062-60 60-60h241c33.085938 0 60 26.914062 60 60zm-299.285156 262 28.285156 28.285156 94.285156-94.285156-94.285156-94.285156-28.285156 28.285156 46 46h-258.714844v40h258.714844zm0 0"/></svg>',
		'logout' 		=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m320.820312 371.792969h39.980469v79.957031c0 33.066406-26.902343 59.964844-59.96875 59.964844h-240.867187c-33.0625 0-59.964844-26.898438-59.964844-59.964844v-391.785156c0-33.0625 26.902344-59.964844 59.964844-59.964844h240.867187c33.066407 0 59.96875 26.902344 59.96875 59.964844v79.957031h-39.980469v-79.957031c0-11.019532-8.964843-19.988282-19.988281-19.988282h-240.867187c-11.019532 0-19.988282 8.96875-19.988282 19.988282v391.785156c0 11.019531 8.96875 19.988281 19.988282 19.988281h240.867187c11.023438 0 19.988281-8.96875 19.988281-19.988281zm96.949219-210.167969-28.269531 28.269531 45.972656 45.976563h-258.570312v39.976562h258.570312l-45.972656 45.972656 28.269531 28.269532 94.230469-94.230469zm0 0"/></svg>',
		'like' 			=> '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.099 475.099" xml:space="preserve"><path d="M442.829,265.532c9.328-14.089,13.986-29.598,13.986-46.538c0-19.607-7.225-36.637-21.687-51.117 c-14.469-14.465-31.601-21.696-51.394-21.696h-50.251c9.134-18.842,13.709-37.117,13.709-54.816c0-22.271-3.34-39.971-9.996-53.105 c-6.663-13.138-16.372-22.795-29.126-28.984C295.313,3.09,280.947,0,264.959,0c-9.712,0-18.274,3.521-25.697,10.566 c-8.183,7.993-14.084,18.274-17.699,30.837c-3.617,12.559-6.521,24.6-8.708,36.116c-2.187,11.515-5.569,19.652-10.135,24.41 c-9.329,10.088-19.511,22.273-30.551,36.547c-19.224,24.932-32.264,39.685-39.113,44.255H54.828 c-10.088,0-18.702,3.574-25.84,10.706c-7.135,7.139-10.705,15.752-10.705,25.841v182.723c0,10.089,3.566,18.699,10.705,25.838 c7.142,7.139,15.752,10.711,25.84,10.711h82.221c4.188,0,17.319,3.806,39.399,11.42c23.413,8.186,44.017,14.418,61.812,18.702 c17.797,4.284,35.832,6.427,54.106,6.427h26.545h10.284c26.836,0,48.438-7.666,64.809-22.99 c16.365-15.324,24.458-36.213,24.27-62.67c11.42-14.657,17.129-31.597,17.129-50.819c0-4.185-0.281-8.277-0.855-12.278 c7.23-12.748,10.854-26.453,10.854-41.11C445.399,278.379,444.544,271.809,442.829,265.532z M85.949,396.58 c-3.616,3.614-7.898,5.428-12.847,5.428c-4.95,0-9.233-1.813-12.85-5.428c-3.615-3.613-5.424-7.897-5.424-12.85 c0-4.948,1.805-9.229,5.424-12.847c3.621-3.617,7.9-5.425,12.85-5.425c4.949,0,9.231,1.808,12.847,5.425 c3.617,3.617,5.426,7.898,5.426,12.847C91.375,388.683,89.566,392.967,85.949,396.58z M414.145,242.419 c-4.093,8.754-9.186,13.227-15.276,13.415c2.854,3.237,5.235,7.762,7.139,13.562c1.902,5.807,2.847,11.087,2.847,15.848 c0,13.127-5.037,24.455-15.126,33.969c3.43,6.088,5.141,12.658,5.141,19.697c0,7.043-1.663,14.038-4.996,20.984 c-3.327,6.94-7.851,11.938-13.559,14.982c0.951,5.709,1.423,11.04,1.423,15.988c0,31.785-18.274,47.678-54.823,47.678h-34.536 c-24.94,0-57.483-6.943-97.648-20.841c-0.953-0.38-3.709-1.383-8.28-2.998s-7.948-2.806-10.138-3.565 c-2.19-0.767-5.518-1.861-9.994-3.285c-4.475-1.431-8.087-2.479-10.849-3.142c-2.758-0.664-5.901-1.283-9.419-1.855 c-3.52-0.571-6.519-0.855-8.993-0.855h-9.136V219.285h9.136c3.045,0,6.423-0.859,10.135-2.568c3.711-1.714,7.52-4.283,11.421-7.71 c3.903-3.427,7.564-6.805,10.992-10.138c3.427-3.33,7.233-7.517,11.422-12.559c4.187-5.046,7.47-9.089,9.851-12.135 c2.378-3.045,5.375-6.949,8.992-11.707c3.615-4.757,5.806-7.613,6.567-8.566c10.467-12.941,17.795-21.601,21.982-25.981 c7.804-8.182,13.466-18.603,16.987-31.261c3.525-12.66,6.427-24.604,8.703-35.832c2.282-11.229,5.903-19.321,10.858-24.27 c18.268,0,30.453,4.471,36.542,13.418c6.088,8.945,9.134,22.746,9.134,41.399c0,11.229-4.572,26.503-13.71,45.821 c-9.134,19.32-13.698,34.5-13.698,45.539h100.495c9.527,0,17.993,3.662,25.413,10.994c7.426,7.327,11.143,15.843,11.143,25.553 C420.284,225.943,418.237,233.653,414.145,242.419z"/></svg>',
		'like-square' 	=> '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.814 456.814" xml:space="preserve"><path d="M441.11,252.677c10.468-11.99,15.704-26.169,15.704-42.54c0-14.846-5.432-27.692-16.259-38.547 c-10.849-10.854-23.695-16.278-38.541-16.278h-79.082c0.76-2.664,1.522-4.948,2.282-6.851c0.753-1.903,1.811-3.999,3.138-6.283 c1.328-2.285,2.283-3.999,2.852-5.139c3.425-6.468,6.047-11.801,7.857-15.985c1.807-4.192,3.606-9.9,5.42-17.133 c1.811-7.229,2.711-14.465,2.711-21.698c0-4.566-0.055-8.281-0.145-11.134c-0.089-2.855-0.574-7.139-1.423-12.85 c-0.862-5.708-2.006-10.467-3.43-14.272c-1.43-3.806-3.716-8.092-6.851-12.847c-3.142-4.764-6.947-8.613-11.424-11.565 c-4.476-2.95-10.184-5.424-17.131-7.421c-6.954-1.999-14.801-2.998-23.562-2.998c-4.948,0-9.227,1.809-12.847,5.426 c-3.806,3.806-7.047,8.564-9.709,14.272c-2.666,5.711-4.523,10.66-5.571,14.849c-1.047,4.187-2.238,9.994-3.565,17.415 c-1.719,7.998-2.998,13.752-3.86,17.273c-0.855,3.521-2.525,8.136-4.997,13.845c-2.477,5.713-5.424,10.278-8.851,13.706 c-6.28,6.28-15.891,17.701-28.837,34.259c-9.329,12.18-18.94,23.695-28.837,34.545c-9.899,10.852-17.131,16.466-21.698,16.847 c-4.755,0.38-8.848,2.331-12.275,5.854c-3.427,3.521-5.14,7.662-5.14,12.419v183.01c0,4.949,1.807,9.182,5.424,12.703 c3.615,3.525,7.898,5.38,12.847,5.571c6.661,0.191,21.698,4.374,45.111,12.566c14.654,4.941,26.12,8.706,34.4,11.272 c8.278,2.566,19.849,5.328,34.684,8.282c14.849,2.949,28.551,4.428,41.11,4.428h4.855h21.7h10.276 c25.321-0.38,44.061-7.806,56.247-22.268c11.036-13.135,15.697-30.361,13.99-51.679c7.422-7.042,12.565-15.984,15.416-26.836 c3.231-11.604,3.231-22.74,0-33.397c8.754-11.611,12.847-24.649,12.272-39.115C445.395,268.286,443.971,261.055,441.11,252.677z"/><path d="M100.5,191.864H18.276c-4.952,0-9.235,1.809-12.851,5.426C1.809,200.905,0,205.188,0,210.137v182.732 c0,4.942,1.809,9.227,5.426,12.847c3.619,3.611,7.902,5.421,12.851,5.421H100.5c4.948,0,9.229-1.81,12.847-5.421 c3.616-3.62,5.424-7.904,5.424-12.847V210.137c0-4.949-1.809-9.231-5.424-12.847C109.73,193.672,105.449,191.864,100.5,191.864z M67.665,369.308c-3.616,3.521-7.898,5.281-12.847,5.281c-5.14,0-9.471-1.76-12.99-5.281c-3.521-3.521-5.281-7.85-5.281-12.99 c0-4.948,1.759-9.232,5.281-12.847c3.52-3.617,7.85-5.428,12.99-5.428c4.949,0,9.231,1.811,12.847,5.428 c3.617,3.614,5.426,7.898,5.426,12.847C73.091,361.458,71.286,365.786,67.665,369.308z"/></svg>',
		'cart' 			=> '<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6.99252 4.99994C6.99252 3.3431 8.33911 1.99997 10.0002 1.99997C11.6613 1.99997 13.0079 3.3431 13.0079 4.99994H15.0131C15.0131 2.23855 12.7687 0 10.0002 0C7.2317 0 4.98738 2.23855 4.98738 4.99994H6.99252Z"/><path d="M1.95379 5.77532L0 6.22503L3.18704 20H16.813L20 6.22503L18.0462 5.77532L15.2178 18H4.78215L1.95379 5.77532Z"/></svg>',
		'facebook' 		=> '<svg viewBox="0 0 12 20" xmlns="http://www.w3.org/2000/svg"><path d="M7.5375 5.60547C7.5375 5.03255 7.65 4.57031 7.875 4.21875C8.1125 3.86719 8.625 3.69141 9.4125 3.69141L11.4188 3.67188V0.15625C11.2438 0.130208 10.8813 0.0976562 10.3313 0.0585938C9.79375 0.0195312 9.18125 0 8.49375 0C7.76875 0 7.10625 0.104167 6.50625 0.3125C5.90625 0.507812 5.3875 0.813802 4.95 1.23047C4.525 1.64714 4.19375 2.16797 3.95625 2.79297C3.71875 3.41797 3.6 4.15365 3.6 5V7.5H0V11.25H3.6L3.61875 20H7.5375V11.25H10.8L12 7.5H7.5375V5.60547Z"/></svg>',
		'twitter' 		=> '<svg viewBox="0 0 20 17" xmlns="http://www.w3.org/2000/svg"><path d="M19.4531 0.30649C19.0495 0.551683 18.6263 0.76282 18.1836 0.939904C17.7539 1.11699 17.3047 1.25321 16.8359 1.34856C16.4714 0.939904 16.0286 0.612981 15.5078 0.367788C14.987 0.122596 14.4336 0 13.8477 0C13.2747 0 12.7409 0.115785 12.2461 0.347356C11.7513 0.565304 11.3151 0.871795 10.9375 1.26683C10.5729 1.64824 10.2799 2.10457 10.0586 2.63582C9.85026 3.15345 9.74609 3.70513 9.74609 4.29087C9.74609 4.45433 9.7526 4.61779 9.76562 4.78125C9.79167 4.94471 9.81771 5.10817 9.84375 5.27163C8.9974 5.23077 8.17057 5.09455 7.36328 4.86298C6.56901 4.63141 5.8138 4.32492 5.09766 3.94351C4.38151 3.54848 3.71094 3.08534 3.08594 2.55409C2.46094 2.02284 1.89453 1.43029 1.38672 0.776442C1.21745 1.10337 1.08073 1.45072 0.976562 1.81851C0.885417 2.17268 0.839844 2.54728 0.839844 2.94231C0.839844 3.69151 1.0026 4.37941 1.32812 5.00601C1.66667 5.63261 2.10938 6.13662 2.65625 6.51803C2.31771 6.50441 1.99219 6.44992 1.67969 6.35457C1.36719 6.25921 1.07422 6.13662 0.800781 5.98678C0.800781 5.98678 0.800781 5.99359 0.800781 6.00721C0.800781 6.00721 0.800781 6.01402 0.800781 6.02764C0.800781 7.0629 1.11328 7.97556 1.73828 8.76562C2.3763 9.55569 3.16406 10.0461 4.10156 10.2368C3.91927 10.2913 3.73698 10.3321 3.55469 10.3594C3.38542 10.3866 3.20312 10.4002 3.00781 10.4002C2.8776 10.4002 2.7474 10.3934 2.61719 10.3798C2.48698 10.3662 2.36328 10.3458 2.24609 10.3185C2.50651 11.1631 2.98177 11.8646 3.67188 12.4231C4.375 12.9816 5.17578 13.2744 6.07422 13.3017C5.37109 13.8738 4.58333 14.3233 3.71094 14.6502C2.85156 14.9772 1.9401 15.1406 0.976562 15.1406C0.807292 15.1406 0.638021 15.1338 0.46875 15.1202C0.3125 15.1066 0.15625 15.0929 0 15.0793C0.455729 15.379 0.93099 15.6514 1.42578 15.8966C1.92057 16.1282 2.42839 16.3257 2.94922 16.4892C3.48307 16.6526 4.02344 16.7821 4.57031 16.8774C5.13021 16.9591 5.70312 17 6.28906 17C8.17708 17 9.84375 16.6322 11.2891 15.8966C12.7474 15.1474 13.9714 14.1871 14.9609 13.0156C15.9505 11.8442 16.6992 10.5365 17.207 9.09255C17.7148 7.63502 17.9688 6.19792 17.9688 4.78125C17.9688 4.6859 17.9622 4.59736 17.9492 4.51562C17.9492 4.42027 17.9492 4.32492 17.9492 4.22957C18.3529 3.92989 18.724 3.59615 19.0625 3.22837C19.4141 2.84696 19.7266 2.4383 20 2.0024C19.6354 2.17949 19.2513 2.32933 18.8477 2.45192C18.457 2.5609 18.0534 2.64263 17.6367 2.69712C18.0664 2.42468 18.4375 2.08413 18.75 1.67548C19.0625 1.26683 19.2969 0.810497 19.4531 0.30649Z"/></svg>',
		'pinterest' 	=> '<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 0C8.61979 0 7.31771 0.260417 6.09375 0.78125C4.88281 1.30208 3.82161 2.01823 2.91016 2.92969C2.01172 3.82812 1.30208 4.88932 0.78125 6.11328C0.260417 7.32422 0 8.61979 0 10C0 11.0547 0.15625 12.0703 0.46875 13.0469C0.78125 14.0104 1.21745 14.8958 1.77734 15.7031C2.33724 16.5104 3.00781 17.2266 3.78906 17.8516C4.57031 18.4635 5.42318 18.9518 6.34766 19.3164C6.30859 18.9128 6.28255 18.444 6.26953 17.9102C6.25651 17.3633 6.29557 16.875 6.38672 16.4453C6.4388 16.25 6.52344 15.8854 6.64062 15.3516C6.77083 14.8047 6.90104 14.2448 7.03125 13.6719C7.17448 13.099 7.29818 12.5911 7.40234 12.1484C7.50651 11.6927 7.55859 11.4648 7.55859 11.4648C7.55859 11.4648 7.50651 11.3281 7.40234 11.0547C7.3112 10.7812 7.26562 10.4232 7.26562 9.98047C7.26562 9.29036 7.44141 8.71745 7.79297 8.26172C8.14453 7.79297 8.57422 7.55859 9.08203 7.55859C9.4987 7.55859 9.8112 7.70182 10.0195 7.98828C10.2279 8.26172 10.332 8.58724 10.332 8.96484C10.332 9.39453 10.2279 9.90885 10.0195 10.5078C9.82422 11.1068 9.65495 11.7057 9.51172 12.3047C9.39453 12.7995 9.48568 13.2227 9.78516 13.5742C10.0977 13.9258 10.5013 14.1016 10.9961 14.1016C11.4388 14.1016 11.849 13.9909 12.2266 13.7695C12.6172 13.5482 12.9492 13.2357 13.2227 12.832C13.5091 12.4284 13.7305 11.9466 13.8867 11.3867C14.056 10.8268 14.1406 10.2083 14.1406 9.53125C14.1406 8.93229 14.0365 8.38542 13.8281 7.89062C13.6198 7.38281 13.3333 6.95312 12.9688 6.60156C12.6042 6.23698 12.1615 5.95703 11.6406 5.76172C11.1328 5.55339 10.5729 5.44922 9.96094 5.44922C9.24479 5.44922 8.60677 5.57292 8.04688 5.82031C7.48698 6.06771 7.01172 6.39323 6.62109 6.79688C6.24349 7.20052 5.95052 7.66276 5.74219 8.18359C5.54688 8.70443 5.44922 9.24479 5.44922 9.80469C5.44922 10.2344 5.52083 10.6576 5.66406 11.0742C5.80729 11.4909 5.98307 11.8229 6.19141 12.0703C6.23047 12.1224 6.25 12.1745 6.25 12.2266C6.26302 12.2656 6.26302 12.3112 6.25 12.3633C6.21094 12.5195 6.15885 12.7344 6.09375 13.0078C6.02865 13.2682 5.98958 13.431 5.97656 13.4961C5.95052 13.5872 5.91146 13.6458 5.85938 13.6719C5.80729 13.6849 5.73568 13.6719 5.64453 13.6328C5.01953 13.3464 4.52474 12.8125 4.16016 12.0312C3.79557 11.25 3.61328 10.4948 3.61328 9.76562C3.61328 8.97135 3.75651 8.20964 4.04297 7.48047C4.32943 6.7513 4.74609 6.10677 5.29297 5.54688C5.85286 4.98698 6.54297 4.54427 7.36328 4.21875C8.18359 3.88021 9.13411 3.71094 10.2148 3.71094C11.0872 3.71094 11.8945 3.86068 12.6367 4.16016C13.3919 4.44661 14.043 4.85026 14.5898 5.37109C15.1497 5.87891 15.5859 6.48438 15.8984 7.1875C16.224 7.89062 16.3867 8.65885 16.3867 9.49219C16.3867 10.3516 16.2565 11.1589 15.9961 11.9141C15.7357 12.6693 15.3776 13.3268 14.9219 13.8867C14.4661 14.4466 13.9193 14.8893 13.2812 15.2148C12.6432 15.5404 11.9466 15.7031 11.1914 15.7031C10.6836 15.7031 10.2148 15.5924 9.78516 15.3711C9.35547 15.1367 9.0625 14.8633 8.90625 14.5508C8.90625 14.5508 8.8151 14.8893 8.63281 15.5664C8.46354 16.2435 8.34635 16.6992 8.28125 16.9336C8.16406 17.3633 7.97526 17.8255 7.71484 18.3203C7.46745 18.8151 7.23958 19.2253 7.03125 19.5508C7.5 19.694 7.98177 19.8047 8.47656 19.8828C8.97135 19.9609 9.47917 20 10 20C11.3802 20 12.6758 19.7396 13.8867 19.2188C15.1107 18.6979 16.1719 17.9883 17.0703 17.0898C17.9818 16.1784 18.6979 15.1172 19.2188 13.9062C19.7396 12.6823 20 11.3802 20 10C20 8.61979 19.7396 7.32422 19.2188 6.11328C18.6979 4.88932 17.9818 3.82812 17.0703 2.92969C16.1719 2.01823 15.1107 1.30208 13.8867 0.78125C12.6758 0.260417 11.3802 0 10 0Z"/></svg>',
		'email' 		=> '<svg viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.009 7.09719C10.6971 7.2772 10.3482 7.36737 9.99961 7.36737C9.65106 7.36737 9.30328 7.27757 8.99266 7.09834L8.98734 7.09523L0 1.78546V13H20V1.86866L11.009 7.09719Z"/><path d="M0 0L9.63184 5.10772C9.86 5.23816 10.1429 5.23779 10.3706 5.10617L20 0H0Z"/></svg>',
		'comment' 		=> '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 0C13.9625 0 18 4.03745 18 9C18 10.8737 17.4017 12.6938 16.2983 14.2231C16.124 14.4647 16.0867 14.7825 16.2191 15.0493L17.1355 16.8971C17.3873 17.4047 17.018 18 16.4514 18H9C4.03745 18 0 13.9625 0 9C0 4.03745 4.03745 0 9 0Z" fill="#89CCF7"/></svg>',
	);
}

/**
 * Gets the SVG code for a given icon.
 *
 * @since  1.0.0
 * @param  string $icon          Icon name.
 * @param  array|string $classes Additional CSS classes
 * @return null|string
 */
function onclinic_get_icon_svg( $icon = '', $classes = array() ) {
	return Onclinic_SVG_Icons::get_svg( $icon, $classes );
}
