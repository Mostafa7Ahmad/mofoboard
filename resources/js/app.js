/**
 * ========================
 *  Core Libraries
 * ========================
 */
import $ from "jquery";
import toastr from "toastr";
import favico from "favico.js";
import { Fancybox } from "@fancyapps/ui";
import Sortable from "sortablejs/modular/sortable.complete.esm.js";

/**
 * ========================
 *  FilePond & Plugins
 * ========================
 */
import * as FilePond from "filepond";
import "filepond/dist/filepond.css";
import ar_AR from "filepond/locale/ar-ar.js";

import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";

/**
 * ========================
 *  Other Dependencies
 * ========================
 */
import "pace-js";
import "pace-js/themes/blue/pace-theme-flash.css";

// Bootstrap & Custom JS
import "./src/bootstrap.bundle.min.js";
import "./src/main.js";

/**
 * ========================
 *  FilePond Config
 * ========================
 */
FilePond.setOptions(ar_AR);
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

/**
 * ========================
 *  Global Exports (window)
 * ========================
 */
window.$ = window.jQuery = $;
window.toastr = toastr;
window.Favico = favico;
window.Fancybox = Fancybox;
window.Sortable = Sortable;
window.FilePond = FilePond;
