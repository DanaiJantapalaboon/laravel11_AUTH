import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'datatables.net-dt';
import 'datatables.net-dt/css/dataTables.dataTables.css';

$(document).ready( function () {
    $('#myTable').dataTable( {
        "pageLength": 50
    });
});