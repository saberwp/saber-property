import { __ } from '@wordpress/i18n';
import { TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {

  const blockProps = useBlockProps();
  const postType = useSelect(
    ( select ) => select( 'core/editor' ).getCurrentPostType(),
    []
  );
  const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );
  const propertyBedroomsValue = meta[ 'property_bedrooms' ];
  function updatePropertyBedrooms( newValue ) {
    setMeta( { ...meta, property_bedrooms: newValue } );
  }

	return (
		<div {...useBlockProps()}>
      <TextControl
        label="Bedrooms"
        value={ propertyBedroomsValue }
        onChange={ updatePropertyBedrooms }
      />
		</div>
	);
}
