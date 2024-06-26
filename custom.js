/*!
 * Print button for Buttons and DataTables.
 * © SpryMedia Ltd - datatables.net/license
 */
! function(n) {
    var o, r;
    "function" == typeof define && define.amd ? define(["jquery", "datatables.net", "datatables.net-buttons"], function(t) {
        return n(t, window, document)
    }) : "object" == typeof exports ? (o = require("jquery"), r = function(t, e) {
        e.fn.dataTable || require("datatables.net")(t, e), e.fn.dataTable.Buttons || require("datatables.net-buttons")(t, e)
    }, "undefined" == typeof window ? module.exports = function(t, e) {
        return t = t || window, e = e || o(t), r(t, e), n(e, t, t.document)
    } : (r(window, o), module.exports = n(o, window, window.document))) : n(jQuery, window, document)
}(function(p, m, t) {
    "use strict";

    function b(t) {
        return n.href = t, -1 === (t = n.host).indexOf("/") && 0 !== n.pathname.indexOf("/") && (t += "/"), n.protocol + "//" + t + n.pathname + n.search
    }
    var e = p.fn.dataTable,
        n = t.createElement("a");
    return e.ext.buttons.print = {
        className: "buttons-print",
        text: function(t) {
            return t.i18n("buttons.print", "Print")
        },
        action: function(t, e, n, o, r) {
            var i = e.buttons.exportData(p.extend({
                    decodeEntities: !1
                }, o.exportOptions)),
                a = e.buttons.exportInfo(o),
                u = e.columns(o.exportOptions.columns).nodes().map(function(t) {
                    return t.className
                }).toArray(),
                s = '<table class="' + e.table().node().className + '">';
            o.header && (s += "<thead>" + i.headerStructure.map(function(t) {
                return "<tr>" + t.map(function(t) {
                    return t ? '<th colspan="' + t.colspan + '" rowspan="' + t.rowspan + '">' + t.title + "</th>" : ""
                }).join("") + "</tr>"
            }).join("") + "</thead>"), s += "<tbody>";
            for (var d = 0, c = i.body.length; d < c; d++) s += function(t, e) {
                for (var n = "<tr>", o = 0, r = t.length; o < r; o++) {
                    var i = null === t[o] || void 0 === t[o] ? "" : t[o];
                    n += "<" + e + " " + (u[o] ? 'class="' + u[o] + '"' : "") + ">" + i + "</" + e + ">"
                }
                return n + "</tr>"
            }(i.body[d], "td");
            s += "</tbody>", o.footer && i.footer && (s += "<tfoot>" + i.footerStructure.map(function(t) {
                return "<tr>" + t.map(function(t) {
                    return t ? '<th colspan="' + t.colspan + '" rowspan="' + t.rowspan + '">' + t.title + "</th>" : ""
                }).join("") + "</tr>"
            }).join("") + "</tfoot>"), s += "</table>";
            var l = m.open("", "");
            if (l) {
                l.document.close();
                var f = "<title>" + a.title + "</title>";
                p("style, link").each(function() {
                    f += function(t) {
                        t = p(t).clone()[0];
                        return "link" === t.nodeName.toLowerCase() && (t.href = b(t.href)), t.outerHTML
                    }(this)
                });
                try {
                    l.document.head.innerHTML = f
                } catch (t) {
                    p(l.document.head).html(f)
                }
                l.document.body.innerHTML = "<h1>" + a.title + "</h1><div>" + (a.messageTop || "") + "</div>" + s + "<div>" + (a.messageBottom || "") + "</div>", p(l.document.body).addClass("dt-print-view"), p("img", l.document.body).each(function(t, e) {
                    e.setAttribute("src", b(e.getAttribute("src")))
                }), o.customize && o.customize(l, o, e);
                l.setTimeout(function() {
                    o.autoPrint && (l.print(), l.close())
                }, 1e3), r()
            } else e.buttons.info(e.i18n("buttons.printErrorTitle", "Unable to open print view"), e.i18n("buttons.printErrorMsg", "Please allow popups in your browser for this site to be able to view the print view."), 5e3)
        },
        async: 100,
        title: "*",
        messageTop: "*",
        messageBottom: "*",
        exportOptions: {},
        header: !0,
        footer: !0,
        autoPrint: !0,
        customize: null
    }, e
});