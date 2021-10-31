import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';

registerBlockType('saber-property/property-meta-input', {
	edit: Edit,
  save() {
    return null;
  },
	attributes: {
		field: {
			type: 'object',
			default: {},
		}
	}
});
