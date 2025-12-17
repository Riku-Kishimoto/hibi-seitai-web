import Edit from './edit';
import save from './save';

import { registerBlockType } from '@wordpress/blocks';

import './editor.scss';
import './style.scss';

registerBlockType('price-block/price-block', {
    edit: Edit,
    save,
});