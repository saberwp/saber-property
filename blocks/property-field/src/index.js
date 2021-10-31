import { registerBlockType } from '@wordpress/blocks';
import './style.scss';

import Edit from './edit';

registerBlockType('saber-property/property-field', {
	edit: Edit,
  save() {
    return null;
  }
});
