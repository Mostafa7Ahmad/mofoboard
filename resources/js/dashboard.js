/**
 * ========================
 *  Core Dependencies
 * ========================
 */
import $ from "jquery";
window.$ = window.jQuery = $;

import toastr from "toastr";
import favico from "favico.js";
import { Fancybox } from "@fancyapps/ui";
import select2 from "select2";

/**
 * ========================
 *  FilePond + Plugins
 * ========================
 */
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import ar_AR from "filepond/locale/ar-ar.js";
FilePond.setOptions(ar_AR);

import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

/**
 * ========================
 *  SortableJS
 * ========================
 */
import Sortable from "sortablejs/modular/sortable.complete.esm.js";

/**
 * ========================
 *  Global Exports
 * ========================
 */
window.toastr = toastr;
window.Favico = favico;
window.Fancybox = Fancybox;
window.FilePond = FilePond;
window.Sortable = Sortable;

/**
 * ========================
 *  UI Init
 * ========================
 */
select2();

/**
 * ========================
 *  Custom Scripts
 * ========================
 */
import "./src/bootstrap.bundle.min.js";
import "./src/main.js";
import "./src/dashboard.js";
