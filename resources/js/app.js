import jQuery from 'jquery';

window.$ = window.jQuery = jQuery;

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import * as FormConfirm from './form-confirm'

window.FormConfirm = FormConfirm;
