import { __ } from '@wordpress/i18n';
import { TextControl, SelectControl } from '@wordpress/components';
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

  const fieldKeyValue = meta[ '_field_key' ];
  function updateFieldKey( newValue ) {
    setMeta( { ...meta, _field_key: newValue } );
  }

  const fieldLabelValue = meta[ '_field_label' ];
  function updateFieldLabel( newValue ) {
    setMeta( { ...meta, _field_label: newValue } );
  }

  const fieldTypeValue = meta[ '_field_type' ];
  function updateFieldType( newValue ) {
    setMeta( { ...meta, _field_type: newValue } );
  }

	return (
		<div {...useBlockProps()}>
      <TextControl
        label="Field Key"
        value={ fieldKeyValue }
        onChange={ updateFieldKey }
      />
      <TextControl
        label="Field Label"
        value={ fieldLabelValue }
        onChange={ updateFieldLabel }
      />
      <SelectControl
        label="Field Type"
        value={ fieldTypeValue }
        options={ [
          { label: 'Text', value: 'text' },
          { label: 'Select', value: 'select' },
          { label: 'Big Text', value: 'big_text' },
        ] }
        onChange={ updateFieldType }
      />
		</div>
	);
}
