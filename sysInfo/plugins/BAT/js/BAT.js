/***************************************************************************
 *   Copyright (C) 2008 by phpSysInfo - A PHP System Information Script    *
 *   http://phpsysinfo.sourceforge.net/                                    *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/
//
// $Id: BAT.js 340 2009-10-13 11:42:09Z bigmichi1 $
//

/*global $, jQuery, buildBlock, datetime, plugin_translate, genlang, appendcss, createBar */

"use strict";

var bat_show = false, bat_table;
/**
 * insert content into table
 * @param {jQuery} xml plugin-XML
 */
function bat_populate(xml) {

    bat_table.fnClearTable();
    
    $("Plugins Plugin_BAT Bat", xml).each(function bat_getitem(idp) {
        var DesignCapacity = "", DesignVoltage = "", RemainingCapacity = "", PresentVoltage = "", ChargingState = "";
        DesignCapacity = $(this).attr("DesignCapacity");
        DesignVoltage = $(this).attr("DesignVoltage");
        RemainingCapacity = $(this).attr("RemainingCapacity");
        PresentVoltage = $(this).attr("PresentVoltage");
        ChargingState = $(this).attr("ChargingState");
        
        bat_table.fnAddData([genlang(3, true, "BAT"), DesignCapacity, '&nbsp;']);
        bat_table.fnAddData([genlang(4, true, "BAT"), RemainingCapacity, createBar(parseInt(parseInt(RemainingCapacity, 10) / parseInt(DesignCapacity, 10) * 100, 10))]);
        bat_table.fnAddData([genlang(9, true, "BAT"), ChargingState, '&nbsp;']);
        bat_table.fnAddData([genlang(5, true, "BAT"), DesignVoltage, '&nbsp;']);
        bat_table.fnAddData([genlang(6, true, "BAT"), PresentVoltage, '&nbsp;']);
        
        bat_show = true;
    });
}

/**
 * fill the plugin block with table structure
 */
function bat_buildTable() {
    var html = "";
    
    html += "<table id=\"Plugin_BATTable\" cellspacing=\"0\">\n";
    html += "  <thead>\n";
    html += "    <tr>\n";
    html += "      <th>" + genlang(7, true, "BAT") + "</th>\n";
    html += "      <th>" + genlang(8, true, "BAT") + "</th>\n";
    html += "      <th>&nbsp;</th>\n";
    html += "    </tr>\n";
    html += "  </thead>\n";
    html += "  <tbody>\n";
    html += "  </tbody>\n";
    html += "</table>\n";
    
    $("#Plugin_BAT").append(html);
    
}

/**
 * load the xml via ajax
 */
function bat_request() {
    $.ajax({
        url: "xml.php?plugin=BAT",
        dataType: "xml",
        error: function bat_error() {
            $.jGrowl("Error loading XML document for Plugin BAT!");
        },
        success: function bat_buildblock(xml) {
			populateErrors(xml);
            bat_populate(xml);
            if (bat_show) {
                plugin_translate("BAT");
                $("#Plugin_BAT").show();
            }
        }
    });
}

$(document).ready(function bat_buildpage() {
    $("#footer").before(buildBlock("BAT", 1, true));
    $("#Plugin_BAT").css("width", "451px");
    
    bat_buildTable();
    
    bat_table = $("#Plugin_BATTable").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bProcessing": true,
        "bAutoWidth": false,
        "bStateSave": true,
        "aoColumns": [{
            "sType": 'span-string'
        }, {
            "sType": 'span-string'
        }, {
            "sType": 'span-string'
        }]
    });
    
    bat_request();
    
    $("#Reload_BATTable").click(function bat_reload(id) {
        bat_request();
        $("#DateTime_BAT").html("(" + genlang(2, true, "BAT") + ":&nbsp;" + datetime() + ")");
    });
});
