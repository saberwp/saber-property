import { __ } from '@wordpress/i18n';
import { TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit( { attributes } ) {

	console.log( attributes )

	const blockProps = useBlockProps();
  const postType = useSelect(
    ( select ) => select( 'core/editor' ).getCurrentPostType(),
    []
  );

	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );
	const currentValue = meta[ attributes.field.key ];
	const fieldLabel   = attributes.field.label;
	function updateFieldMeta( newValue ) {

		console.log( newValue )
		console.log( attributes.field.key )

    setMeta( { ...meta, [attributes.field.key]: newValue } );
  }

	return (
		<div {...useBlockProps()}>
			<TextControl
				label={ fieldLabel }
				value={ currentValue }
				onChange={ updateFieldMeta }
			/>
		</div>
	);
}
