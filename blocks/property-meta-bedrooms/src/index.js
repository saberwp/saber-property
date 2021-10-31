import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';

registerBlockType('create-block/property-meta-bedrooms', {
	edit: Edit,
  save() {
    return null;
  },
});
