export default function vs_injector_init () {
	wp.blocks.updateCategory( 'vinoshipper', { icon: vs_generate_logo() } );
}

function vs_generate_logo () {
	return (
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
			<defs>
				<style>{'.vs-logo-gradient{fill:url(#vs-logo-linear-gradient);}'}</style>
				<linearGradient id="vs-logo-linear-gradient" x1="412.34" y1="681.61" x2="678.24" y2="458.49" gradientUnits="userSpaceOnUse">
					<stop offset="0" stop-color="#fff" stop-opacity="0.35"/>
					<stop offset="0.08" stop-color="#fff" stop-opacity="0.46"/>
					<stop offset="0.21" stop-color="#fff" stop-opacity="0.63"/>
					<stop offset="0.34" stop-color="#fff" stop-opacity="0.76"/>
					<stop offset="0.47" stop-color="#fff" stop-opacity="0.87"/>
					<stop offset="0.6" stop-color="#fff" stop-opacity="0.94"/>
					<stop offset="0.74" stop-color="#fff" stop-opacity="0.99"/>
					<stop offset="0.89" stop-color="#fff"/>
				</linearGradient>
			</defs>
			<circle fill="#8031a7" cx="512" cy="512" r="512"/>
			<path fill="#ffffff" d="M512.58,651.42,405.75,246A40,40,0,0,0,367,216.16H323.74a40.05,40.05,0,0,0-38.67,50.5L424.21,781.25a67.22,67.22,0,0,0,64.88,49.67h47a67.15,67.15,0,0,0,53.5-26.61C553.43,803,534.37,734.91,512.58,651.42Z"/>
			<path class="vs-logo-gradient" d="M701.44,216.16H658.15A40.05,40.05,0,0,0,619.42,246L512.58,651.42c21.79,83.49,40.85,151.57,77,152.89A68.32,68.32,0,0,0,601,781.25L740.1,266.66A40.05,40.05,0,0,0,701.44,216.16Z"/>
		</svg>
	)
}