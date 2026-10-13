/**
 * Vinoshipper Injector for WordPress: Announcement, Edit
 *
 * @package
 */

import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import './editor.scss';
import vsIcon from '../core/vinoshipper.svg';

export default function Edit( {} ) {
	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Settings" initialOpen={ true }>
					<fieldset>
						<p>
							Announcement will render only when the defined in{ ' ' }
							<a
								href="https://vinoshipper.com/ui/producer/products/announcement"
								target="_blank"
								rel="noreferrer"
							>
								&quot;Products -&gt; Announcement&quot;
							</a>{ ' ' }
							using your Vinoshipper Producer&apos;s Admin access.
						</p>
					</fieldset>
				</PanelBody>
			</InspectorControls>
			<div className="vs-injector-block-editor-content">
				<div className="vs-injector-block-announcement">
					<div className="vs-injector-block-header">
						<img
							src={ vsIcon }
							className="vs-icon"
							alt="Vinoshipper"
						/>
						<h2>Announcement</h2>
					</div>
					<p>View page to see the fully rendered component.</p>
					<p>
						Announcement will render <em>only</em> when defined in
						the Vinoshipper Producer Admin. See block settings for
						more details.
					</p>
				</div>
			</div>
		</div>
	);
}
