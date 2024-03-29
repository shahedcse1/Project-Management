!function (r) {
    r.color = {}, r.color.make = function (e, t, i, o) {
        var n = {};
        return n.r = e || 0, n.g = t || 0, n.b = i || 0, n.a = null != o ? o : 1, n.add = function (e, t) {
            for (var i = 0; i < e.length; ++i) n[e.charAt(i)] += t;
            return n.normalize()
        }, n.scale = function (e, t) {
            for (var i = 0; i < e.length; ++i) n[e.charAt(i)] *= t;
            return n.normalize()
        }, n.toString = function () {
            return 1 <= n.a ? "rgb(" + [n.r, n.g, n.b].join(",") + ")" : "rgba(" + [n.r, n.g, n.b, n.a].join(",") + ")"
        }, n.normalize = function () {
            function e(e, t, i) {
                return t < e ? e : i < t ? i : t
            }

            return n.r = e(0, parseInt(n.r), 255), n.g = e(0, parseInt(n.g), 255), n.b = e(0, parseInt(n.b), 255), n.a = e(0, n.a, 1), n
        }, n.clone = function () {
            return r.color.make(n.r, n.b, n.g, n.a)
        }, n.normalize()
    }, r.color.extract = function (e, t) {
        var i;
        do {
            if ("" != (i = e.css(t).toLowerCase()) && "transparent" != i) break;
            e = e.parent()
        } while (e.length && !r.nodeName(e.get(0), "body"));
        return "rgba(0, 0, 0, 0)" == i && (i = "transparent"), r.color.parse(i)
    }, r.color.parse = function (e) {
        var t, i = r.color.make;
        if (t = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(e)) return i(parseInt(t[1], 10), parseInt(t[2], 10), parseInt(t[3], 10));
        if (t = /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(e)) return i(parseInt(t[1], 10), parseInt(t[2], 10), parseInt(t[3], 10), parseFloat(t[4]));
        if (t = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(e)) return i(2.55 * parseFloat(t[1]), 2.55 * parseFloat(t[2]), 2.55 * parseFloat(t[3]));
        if (t = /rgba\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\s*\)/.exec(e)) return i(2.55 * parseFloat(t[1]), 2.55 * parseFloat(t[2]), 2.55 * parseFloat(t[3]), parseFloat(t[4]));
        if (t = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(e)) return i(parseInt(t[1], 16), parseInt(t[2], 16), parseInt(t[3], 16));
        if (t = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(e)) return i(parseInt(t[1] + t[1], 16), parseInt(t[2] + t[2], 16), parseInt(t[3] + t[3], 16));
        var o = r.trim(e).toLowerCase();
        return "transparent" == o ? i(255, 255, 255, 0) : i((t = n[o] || [0, 0, 0])[0], t[1], t[2])
    };
    var n = {
        aqua: [0, 255, 255],
        azure: [240, 255, 255],
        beige: [245, 245, 220],
        black: [0, 0, 0],
        blue: [0, 0, 255],
        brown: [165, 42, 42],
        cyan: [0, 255, 255],
        darkblue: [0, 0, 139],
        darkcyan: [0, 139, 139],
        darkgrey: [169, 169, 169],
        darkgreen: [0, 100, 0],
        darkkhaki: [189, 183, 107],
        darkmagenta: [139, 0, 139],
        darkolivegreen: [85, 107, 47],
        darkorange: [255, 140, 0],
        darkorchid: [153, 50, 204],
        darkred: [139, 0, 0],
        darksalmon: [233, 150, 122],
        darkviolet: [148, 0, 211],
        fuchsia: [255, 0, 255],
        gold: [255, 215, 0],
        green: [0, 128, 0],
        indigo: [75, 0, 130],
        khaki: [240, 230, 140],
        lightblue: [173, 216, 230],
        lightcyan: [224, 255, 255],
        lightgreen: [144, 238, 144],
        lightgrey: [211, 211, 211],
        lightpink: [255, 182, 193],
        lightyellow: [255, 255, 224],
        lime: [0, 255, 0],
        magenta: [255, 0, 255],
        maroon: [128, 0, 0],
        navy: [0, 0, 128],
        olive: [128, 128, 0],
        orange: [255, 165, 0],
        pink: [255, 192, 203],
        purple: [128, 0, 128],
        violet: [128, 0, 128],
        red: [255, 0, 0],
        silver: [192, 192, 192],
        white: [255, 255, 255],
        yellow: [255, 255, 0]
    }
}(jQuery), function (Q) {
    var p = Object.prototype.hasOwnProperty;

    function V(e, t) {
        var i = t.children("." + e)[0];
        if (null == i && ((i = document.createElement("canvas")).className = e, Q(i).css({
            direction: "ltr",
            position: "absolute",
            left: 0,
            top: 0
        }).appendTo(t), !i.getContext)) {
            if (!window.G_vmlCanvasManager) throw new Error("Canvas is not available. If you're using IE with a fall-back such as Excanvas, then there's either a mistake in your conditional include, or the page has no DOCTYPE and is rendering in Quirks Mode.");
            i = window.G_vmlCanvasManager.initElement(i)
        }
        this.element = i;
        var o = this.context = i.getContext("2d"), n = window.devicePixelRatio || 1,
            r = o.webkitBackingStorePixelRatio || o.mozBackingStorePixelRatio || o.msBackingStorePixelRatio || o.oBackingStorePixelRatio || o.backingStorePixelRatio || 1;
        this.pixelRatio = n / r, this.resize(t.width(), t.height()), this.textContainer = null, this.text = {}, this._textCache = {}
    }

    function o(m, e, t, o) {
        var C = [], A = {
                colors: ["#edc240", "#afd8f8", "#cb4b4b", "#4da74d", "#9440ed"],
                legend: {
                    show: !0,
                    noColumns: 1,
                    labelFormatter: null,
                    labelBoxBorderColor: "#ccc",
                    container: null,
                    position: "ne",
                    margin: 5,
                    backgroundColor: null,
                    backgroundOpacity: .85,
                    sorted: null
                },
                xaxis: {
                    show: null,
                    position: "bottom",
                    mode: null,
                    font: null,
                    color: null,
                    tickColor: null,
                    transform: null,
                    inverseTransform: null,
                    min: null,
                    max: null,
                    autoscaleMargin: null,
                    ticks: null,
                    tickFormatter: null,
                    labelWidth: null,
                    labelHeight: null,
                    reserveSpace: null,
                    tickLength: null,
                    alignTicksWithAxis: null,
                    tickDecimals: null,
                    tickSize: null,
                    minTickSize: null
                },
                yaxis: {autoscaleMargin: .02, position: "left"},
                xaxes: [],
                yaxes: [],
                series: {
                    points: {show: !1, radius: 3, lineWidth: 2, fill: !0, fillColor: "#ffffff", symbol: "circle"},
                    lines: {lineWidth: 2, fill: !1, fillColor: null, steps: !1},
                    bars: {
                        show: !1,
                        lineWidth: 2,
                        barWidth: 1,
                        fill: !0,
                        fillColor: null,
                        align: "left",
                        horizontal: !1,
                        zero: !0
                    },
                    shadowSize: 3,
                    highlightColor: null
                },
                grid: {
                    show: !0,
                    aboveData: !1,
                    color: "#545454",
                    backgroundColor: null,
                    borderColor: null,
                    tickColor: null,
                    margin: 0,
                    labelMargin: 5,
                    axisMargin: 8,
                    borderWidth: 2,
                    minBorderMargin: null,
                    markings: null,
                    markingsColor: "#f4f4f4",
                    markingsLineWidth: 2,
                    clickable: !1,
                    hoverable: !1,
                    autoHighlight: !0,
                    mouseActiveRadius: 10
                },
                interaction: {redrawOverlayInterval: 1e3 / 60},
                hooks: {}
            }, p = null, i = null, h = null, y = null, c = null, d = [], g = [], w = {left: 0, right: 0, top: 0, bottom: 0},
            M = 0, T = 0, z = {
                processOptions: [],
                processRawData: [],
                processDatapoints: [],
                processOffset: [],
                drawBackground: [],
                drawSeries: [],
                draw: [],
                bindEvents: [],
                drawOverlay: [],
                shutdown: []
            }, S = this;

        function W(e, t) {
            t = [S].concat(t);
            for (var i = 0; i < e.length; ++i) e[i].apply(this, t)
        }

        function n(e) {
            C = function (e) {
                for (var t = [], i = 0; i < e.length; ++i) {
                    var o = Q.extend(!0, {}, A.series);
                    null != e[i].data ? (o.data = e[i].data, delete e[i].data, Q.extend(!0, o, e[i]), e[i].data = o.data) : o.data = e[i], t.push(o)
                }
                return t
            }(e), function () {
                var e, t = C.length, i = -1;
                for (e = 0; e < C.length; ++e) {
                    var o = C[e].color;
                    null != o && (t--, "number" == typeof o && i < o && (i = o))
                }
                t <= i && (t = i + 1);
                var n, r = [], a = A.colors, l = a.length, s = 0;
                for (e = 0; e < t; e++) n = Q.color.parse(a[e % l] || "#666"), e % l == 0 && e && (s = 0 <= s ? s < .5 ? -s - .2 : 0 : -s), r[e] = n.scale("rgb", 1 + s);
                var c, h = 0;
                for (e = 0; e < C.length; ++e) {
                    if (null == (c = C[e]).color ? (c.color = r[h].toString(), ++h) : "number" == typeof c.color && (c.color = r[c.color].toString()), null == c.lines.show) {
                        var u, f = !0;
                        for (u in c) if (c[u] && c[u].show) {
                            f = !1;
                            break
                        }
                        f && (c.lines.show = !0)
                    }
                    null == c.lines.zero && (c.lines.zero = !!c.lines.fill), c.xaxis = v(d, x(c, "x")), c.yaxis = v(g, x(c, "y"))
                }
            }(), function () {
                var e, t, i, o, n, r, a, l, s, c, h, u, f = Number.POSITIVE_INFINITY, p = Number.NEGATIVE_INFINITY,
                    d = Number.MAX_VALUE;

                function g(e, t, i) {
                    t < e.datamin && t != -d && (e.datamin = t), i > e.datamax && i != d && (e.datamax = i)
                }

                for (Q.each(I(), function (e, t) {
                    t.datamin = f, t.datamax = p, t.used = !1
                }), e = 0; e < C.length; ++e) (n = C[e]).datapoints = {points: []}, W(z.processRawData, [n, n.data, n.datapoints]);
                for (e = 0; e < C.length; ++e) {
                    if (n = C[e], h = n.data, !(u = n.datapoints.format)) {
                        if ((u = []).push({x: !0, number: !0, required: !0}), u.push({
                            y: !0,
                            number: !0,
                            required: !0
                        }), n.bars.show || n.lines.show && n.lines.fill) {
                            var m = !!(n.bars.show && n.bars.zero || n.lines.show && n.lines.zero);
                            u.push({
                                y: !0,
                                number: !0,
                                required: !1,
                                defaultValue: 0,
                                autoscale: m
                            }), n.bars.horizontal && (delete u[u.length - 1].y, u[u.length - 1].x = !0)
                        }
                        n.datapoints.format = u
                    }
                    if (null == n.datapoints.pointsize) {
                        n.datapoints.pointsize = u.length, a = n.datapoints.pointsize, r = n.datapoints.points;
                        var x = n.lines.show && n.lines.steps;
                        for (n.xaxis.used = n.yaxis.used = !0, t = i = 0; t < h.length; ++t, i += a) {
                            var v = null == (c = h[t]);
                            if (!v) for (o = 0; o < a; ++o) l = c[o], (s = u[o]) && (s.number && null != l && (l = +l, isNaN(l) ? l = null : l == 1 / 0 ? l = d : l == -1 / 0 && (l = -d)), null == l && (s.required && (v = !0), null != s.defaultValue && (l = s.defaultValue))), r[i + o] = l;
                            if (v) for (o = 0; o < a; ++o) null != (l = r[i + o]) && !1 !== (s = u[o]).autoscale && (s.x && g(n.xaxis, l, l), s.y && g(n.yaxis, l, l)), r[i + o] = null; else if (x && 0 < i && null != r[i - a] && r[i - a] != r[i] && r[i - a + 1] != r[i + 1]) {
                                for (o = 0; o < a; ++o) r[i + a + o] = r[i + o];
                                r[i + 1] = r[i - a + 1], i += a
                            }
                        }
                    }
                }
                for (e = 0; e < C.length; ++e) n = C[e], W(z.processDatapoints, [n, n.datapoints]);
                for (e = 0; e < C.length; ++e) {
                    n = C[e], r = n.datapoints.points, a = n.datapoints.pointsize, u = n.datapoints.format;
                    var b = f, k = f, y = p, w = p;
                    for (t = 0; t < r.length; t += a) if (null != r[t]) for (o = 0; o < a; ++o) l = r[t + o], (s = u[o]) && !1 !== s.autoscale && l != d && l != -d && (s.x && (l < b && (b = l), y < l && (y = l)), s.y && (l < k && (k = l), w < l && (w = l)));
                    if (n.bars.show) {
                        var M;
                        switch (n.bars.align) {
                            case"left":
                                M = 0;
                                break;
                            case"right":
                                M = -n.bars.barWidth;
                                break;
                            default:
                                M = -n.bars.barWidth / 2
                        }
                        n.bars.horizontal ? (k += M, w += M + n.bars.barWidth) : (b += M, y += M + n.bars.barWidth)
                    }
                    g(n.xaxis, b, y), g(n.yaxis, k, w)
                }
                Q.each(I(), function (e, t) {
                    t.datamin == f && (t.datamin = null), t.datamax == p && (t.datamax = null)
                })
            }()
        }

        function x(e, t) {
            var i = e[t + "axis"];
            return "object" == typeof i && (i = i.n), "number" != typeof i && (i = 1), i
        }

        function I() {
            return Q.grep(d.concat(g), function (e) {
                return e
            })
        }

        function u(e) {
            var t, i, o = {};
            for (t = 0; t < d.length; ++t) (i = d[t]) && i.used && (o["x" + i.n] = i.c2p(e.left));
            for (t = 0; t < g.length; ++t) (i = g[t]) && i.used && (o["y" + i.n] = i.c2p(e.top));
            return void 0 !== o.x1 && (o.x = o.x1), void 0 !== o.y1 && (o.y = o.y1), o
        }

        function v(e, t) {
            return e[t - 1] || (e[t - 1] = {
                n: t,
                direction: e == d ? "x" : "y",
                options: Q.extend(!0, {}, e == d ? A.xaxis : A.yaxis)
            }), e[t - 1]
        }

        function r() {
            R && clearTimeout(R), h.unbind("mousemove", N), h.unbind("mouseleave", D), h.unbind("click", L), W(z.shutdown, [h])
        }

        function a(i) {
            var e = i.labelWidth, t = i.labelHeight, o = i.options.position, n = "x" === i.direction,
                r = i.options.tickLength, a = A.grid.axisMargin, l = A.grid.labelMargin, s = !0, c = !0, h = !0, u = !1;
            Q.each(n ? d : g, function (e, t) {
                t && (t.show || t.reserveSpace) && (t === i ? u = !0 : t.options.position === o && (u ? c = !1 : s = !1), u || (h = !1))
            }), c && (a = 0), null == r && (r = h ? "full" : 5), isNaN(+r) || (l += +r), n ? (t += l, "bottom" == o ? (w.bottom += t + a, i.box = {
                top: p.height - w.bottom,
                height: t
            }) : (i.box = {
                top: w.top + a,
                height: t
            }, w.top += t + a)) : (e += l, "left" == o ? (i.box = {
                left: w.left + a,
                width: e
            }, w.left += e + a) : (w.right += e + a, i.box = {
                left: p.width - w.right,
                width: e
            })), i.position = o, i.tickLength = r, i.box.padding = l, i.innermost = s
        }

        function l() {
            var e, t = I(), i = A.grid.show;
            for (var o in w) {
                var n = A.grid.margin || 0;
                w[o] = "number" == typeof n ? n : n[o] || 0
            }
            for (var o in W(z.processOffset, [w]), w) "object" == typeof A.grid.borderWidth ? w[o] += i ? A.grid.borderWidth[o] : 0 : w[o] += i ? A.grid.borderWidth : 0;
            if (Q.each(t, function (e, t) {
                var i = t.options;
                t.show = null == i.show ? t.used : i.show, t.reserveSpace = null == i.reserveSpace ? t.show : i.reserveSpace, function (e) {
                    var t = e.options, i = +(null != t.min ? t.min : e.datamin),
                        o = +(null != t.max ? t.max : e.datamax), n = o - i;
                    if (0 == n) {
                        var r = 0 == o ? 1 : .01;
                        null == t.min && (i -= r), null != t.max && null == t.min || (o += r)
                    } else {
                        var a = t.autoscaleMargin;
                        null != a && (null == t.min && (i -= n * a) < 0 && null != e.datamin && 0 <= e.datamin && (i = 0), null == t.max && 0 < (o += n * a) && null != e.datamax && e.datamax <= 0 && (o = 0))
                    }
                    e.min = i, e.max = o
                }(t)
            }), i) {
                var r = Q.grep(t, function (e) {
                    return e.show || e.reserveSpace
                });
                for (Q.each(r, function (e, t) {
                    var i, o;
                    !function (e) {
                        var t, i = e.options;
                        t = "number" == typeof i.ticks && 0 < i.ticks ? i.ticks : .3 * Math.sqrt("x" == e.direction ? p.width : p.height);
                        var o = (e.max - e.min) / t, n = -Math.floor(Math.log(o) / Math.LN10), r = i.tickDecimals;
                        null != r && r < n && (n = r);
                        var a, l = Math.pow(10, -n), s = o / l;
                        s < 1.5 ? a = 1 : s < 3 ? (a = 2, 2.25 < s && (null == r || n + 1 <= r) && (a = 2.5, ++n)) : a = s < 7.5 ? 5 : 10;
                        a *= l, null != i.minTickSize && a < i.minTickSize && (a = i.minTickSize);
                        if (e.delta = o, e.tickDecimals = Math.max(0, null != r ? r : n), e.tickSize = i.tickSize || a, "time" == i.mode && !e.tickGenerator) throw new Error("Time mode requires the flot.time plugin.");
                        e.tickGenerator || (e.tickGenerator = function (e) {
                            for (var t, i, o, n = [], r = (i = e.min, (o = e.tickSize) * Math.floor(i / o)), a = 0, l = Number.NaN; t = l, l = r + a * e.tickSize, n.push(l), ++a, l < e.max && l != t;) ;
                            return n
                        }, e.tickFormatter = function (e, t) {
                            var i = t.tickDecimals ? Math.pow(10, t.tickDecimals) : 1, o = "" + Math.round(e * i) / i;
                            if (null != t.tickDecimals) {
                                var n = o.indexOf("."), r = -1 == n ? 0 : o.length - n - 1;
                                if (r < t.tickDecimals) return (r ? o : o + ".") + ("" + i).substr(1, t.tickDecimals - r)
                            }
                            return o
                        });
                        Q.isFunction(i.tickFormatter) && (e.tickFormatter = function (e, t) {
                            return "" + i.tickFormatter(e, t)
                        });
                        if (null != i.alignTicksWithAxis) {
                            var c = ("x" == e.direction ? d : g)[i.alignTicksWithAxis - 1];
                            if (c && c.used && c != e) {
                                var h = e.tickGenerator(e);
                                if (0 < h.length && (null == i.min && (e.min = Math.min(e.min, h[0])), null == i.max && 1 < h.length && (e.max = Math.max(e.max, h[h.length - 1]))), e.tickGenerator = function (e) {
                                    var t, i, o = [];
                                    for (i = 0; i < c.ticks.length; ++i) t = (c.ticks[i].v - c.min) / (c.max - c.min), t = e.min + t * (e.max - e.min), o.push(t);
                                    return o
                                }, !e.mode && null == i.tickDecimals) {
                                    var u = Math.max(0, 1 - Math.floor(Math.log(e.delta) / Math.LN10)),
                                        f = e.tickGenerator(e);
                                    1 < f.length && /\..*0$/.test((f[1] - f[0]).toFixed(u)) || (e.tickDecimals = u)
                                }
                            }
                        }
                    }(t), function (e) {
                        var t, i, o = e.options.ticks, n = [];
                        null == o || "number" == typeof o && 0 < o ? n = e.tickGenerator(e) : o && (n = Q.isFunction(o) ? o(e) : o);
                        for (e.ticks = [], t = 0; t < n.length; ++t) {
                            var r = null, a = n[t];
                            "object" == typeof a ? (i = +a[0], 1 < a.length && (r = a[1])) : i = +a, null == r && (r = e.tickFormatter(i, e)), isNaN(i) || e.ticks.push({
                                v: i,
                                label: r
                            })
                        }
                    }(t), o = (i = t).ticks, i.options.autoscaleMargin && 0 < o.length && (null == i.options.min && (i.min = Math.min(i.min, o[0].v)), null == i.options.max && 1 < o.length && (i.max = Math.max(i.max, o[o.length - 1].v))), function (e) {
                        for (var t = e.options, i = e.ticks || [], o = t.labelWidth || 0, n = t.labelHeight || 0, r = o || ("x" == e.direction ? Math.floor(p.width / (i.length || 1)) : null), a = e.direction + "Axis " + e.direction + e.n + "Axis", l = "flot-" + e.direction + "-axis flot-" + e.direction + e.n + "-axis " + a, s = t.font || "flot-tick-label tickLabel", c = 0; c < i.length; ++c) {
                            var h = i[c];
                            if (h.label) {
                                var u = p.getTextInfo(l, h.label, s, null, r);
                                o = Math.max(o, u.width), n = Math.max(n, u.height)
                            }
                        }
                        e.labelWidth = t.labelWidth || o, e.labelHeight = t.labelHeight || n
                    }(t)
                }), e = r.length - 1; 0 <= e; --e) a(r[e]);
                !function () {
                    var e, t = A.grid.minBorderMargin;
                    if (null == t) for (e = t = 0; e < C.length; ++e) t = Math.max(t, 2 * (C[e].points.radius + C[e].points.lineWidth / 2));
                    var i = {left: t, right: t, top: t, bottom: t};
                    Q.each(I(), function (e, t) {
                        t.reserveSpace && t.ticks && t.ticks.length && ("x" === t.direction ? (i.left = Math.max(i.left, t.labelWidth / 2), i.right = Math.max(i.right, t.labelWidth / 2)) : (i.bottom = Math.max(i.bottom, t.labelHeight / 2), i.top = Math.max(i.top, t.labelHeight / 2)))
                    }), w.left = Math.ceil(Math.max(i.left, w.left)), w.right = Math.ceil(Math.max(i.right, w.right)), w.top = Math.ceil(Math.max(i.top, w.top)), w.bottom = Math.ceil(Math.max(i.bottom, w.bottom))
                }(), Q.each(r, function (e, t) {
                    var i;
                    "x" == (i = t).direction ? (i.box.left = w.left - i.labelWidth / 2, i.box.width = p.width - w.left - w.right + i.labelWidth) : (i.box.top = w.top - i.labelHeight / 2, i.box.height = p.height - w.bottom - w.top + i.labelHeight)
                })
            }
            M = p.width - w.left - w.right, T = p.height - w.bottom - w.top, Q.each(t, function (e, t) {
                !function (e) {
                    function t(e) {
                        return e
                    }

                    var i, o, n = e.options.transform || t, r = e.options.inverseTransform;
                    "x" == e.direction ? (i = e.scale = M / Math.abs(n(e.max) - n(e.min)), o = Math.min(n(e.max), n(e.min))) : (i = -(i = e.scale = T / Math.abs(n(e.max) - n(e.min))), o = Math.max(n(e.max), n(e.min))), e.p2c = n == t ? function (e) {
                        return (e - o) * i
                    } : function (e) {
                        return (n(e) - o) * i
                    }, e.c2p = r ? function (e) {
                        return r(o + e / i)
                    } : function (e) {
                        return o + e / i
                    }
                }(t)
            }), i && Q.each(I(), function (e, t) {
                var i, o, n, r, a, l = t.box, s = t.direction + "Axis " + t.direction + t.n + "Axis",
                    c = "flot-" + t.direction + "-axis flot-" + t.direction + t.n + "-axis " + s,
                    h = t.options.font || "flot-tick-label tickLabel";
                if (p.removeText(c), t.show && 0 != t.ticks.length) for (var u = 0; u < t.ticks.length; ++u) !(i = t.ticks[u]).label || i.v < t.min || i.v > t.max || ("x" == t.direction ? (r = "center", o = w.left + t.p2c(i.v), "bottom" == t.position ? n = l.top + l.padding : (n = l.top + l.height - l.padding, a = "bottom")) : (a = "middle", n = w.top + t.p2c(i.v), "left" == t.position ? (o = l.left + l.width - l.padding, r = "right") : o = l.left + l.padding), p.addText(c, o, n, i.label, h, null, null, r, a))
            }), function () {
                null != A.legend.container ? Q(A.legend.container).html("") : m.find(".legend").remove();
                if (!A.legend.show) return;
                for (var e, t, i = [], o = [], n = !1, r = A.legend.labelFormatter, a = 0; a < C.length; ++a) (e = C[a]).label && (t = r ? r(e.label, e) : e.label) && o.push({
                    label: t,
                    color: e.color
                });
                if (A.legend.sorted) if (Q.isFunction(A.legend.sorted)) o.sort(A.legend.sorted); else if ("reverse" == A.legend.sorted) o.reverse(); else {
                    var l = "descending" != A.legend.sorted;
                    o.sort(function (e, t) {
                        return e.label == t.label ? 0 : e.label < t.label != l ? 1 : -1
                    })
                }
                for (var a = 0; a < o.length; ++a) {
                    var s = o[a];
                    a % A.legend.noColumns == 0 && (n && i.push("</tr>"), i.push("<tr>"), n = !0), i.push('<td class="legendColorBox"><div style="border:1px solid ' + A.legend.labelBoxBorderColor + ';padding:1px"><div style="width:4px;height:0;border:5px solid ' + s.color + ';overflow:hidden"></div></div></td><td class="legendLabel">' + s.label + "</td>")
                }
                n && i.push("</tr>");
                if (0 == i.length) return;
                var c = '<table style="font-size:smaller;color:' + A.grid.color + '">' + i.join("") + "</table>";
                if (null != A.legend.container) Q(A.legend.container).html(c); else {
                    var h = "", u = A.legend.position, f = A.legend.margin;
                    null == f[0] && (f = [f, f]), "n" == u.charAt(0) ? h += "top:" + (f[1] + w.top) + "px;" : "s" == u.charAt(0) && (h += "bottom:" + (f[1] + w.bottom) + "px;"), "e" == u.charAt(1) ? h += "right:" + (f[0] + w.right) + "px;" : "w" == u.charAt(1) && (h += "left:" + (f[0] + w.left) + "px;");
                    var p = Q('<div class="legend">' + c.replace('style="', 'style="position:absolute;' + h + ";") + "</div>").appendTo(m);
                    if (0 != A.legend.backgroundOpacity) {
                        var d = A.legend.backgroundColor;
                        null == d && ((d = (d = A.grid.backgroundColor) && "string" == typeof d ? Q.color.parse(d) : Q.color.extract(p, "background-color")).a = 1, d = d.toString());
                        var g = p.children();
                        Q('<div style="position:absolute;width:' + g.width() + "px;height:" + g.height() + "px;" + h + "background-color:" + d + ';"> </div>').prependTo(p).css("opacity", A.legend.backgroundOpacity)
                    }
                }
            }()
        }

        function s() {
            p.clear(), W(z.drawBackground, [y]);
            var e = A.grid;
            e.show && e.backgroundColor && (y.save(), y.translate(w.left, w.top), y.fillStyle = _(A.grid.backgroundColor, T, 0, "rgba(255, 255, 255, 0)"), y.fillRect(0, 0, M, T), y.restore()), e.show && !e.aboveData && f();
            for (var t = 0; t < C.length; ++t) W(z.drawSeries, [y, C[t]]), b(C[t]);
            W(z.draw, [y]), e.show && e.aboveData && f(), p.render(), q()
        }

        function P(e, t) {
            for (var i, o, n, r, a = I(), l = 0; l < a.length; ++l) if ((i = a[l]).direction == t && (e[r = t + i.n + "axis"] || 1 != i.n || (r = t + "axis"), e[r])) {
                o = e[r].from, n = e[r].to;
                break
            }
            if (e[r] || (i = "x" == t ? d[0] : g[0], o = e[t + "1"], n = e[t + "2"]), null != o && null != n && n < o) {
                var s = o;
                o = n, n = s
            }
            return {from: o, to: n, axis: i}
        }

        function f() {
            var e, t, i, o;
            y.save(), y.translate(w.left, w.top);
            var n = A.grid.markings;
            if (n) for (Q.isFunction(n) && ((t = S.getAxes()).xmin = t.xaxis.min, t.xmax = t.xaxis.max, t.ymin = t.yaxis.min, t.ymax = t.yaxis.max, n = n(t)), e = 0; e < n.length; ++e) {
                var r = n[e], a = P(r, "x"), l = P(r, "y");
                if (null == a.from && (a.from = a.axis.min), null == a.to && (a.to = a.axis.max), null == l.from && (l.from = l.axis.min), null == l.to && (l.to = l.axis.max), !(a.to < a.axis.min || a.from > a.axis.max || l.to < l.axis.min || l.from > l.axis.max)) {
                    a.from = Math.max(a.from, a.axis.min), a.to = Math.min(a.to, a.axis.max), l.from = Math.max(l.from, l.axis.min), l.to = Math.min(l.to, l.axis.max);
                    var s = a.from === a.to, c = l.from === l.to;
                    if (!s || !c) if (a.from = Math.floor(a.axis.p2c(a.from)), a.to = Math.floor(a.axis.p2c(a.to)), l.from = Math.floor(l.axis.p2c(l.from)), l.to = Math.floor(l.axis.p2c(l.to)), s || c) {
                        var h = r.lineWidth || A.grid.markingsLineWidth, u = h % 2 ? .5 : 0;
                        y.beginPath(), y.strokeStyle = r.color || A.grid.markingsColor, y.lineWidth = h, s ? (y.moveTo(a.to + u, l.from), y.lineTo(a.to + u, l.to)) : (y.moveTo(a.from, l.to + u), y.lineTo(a.to, l.to + u)), y.stroke()
                    } else y.fillStyle = r.color || A.grid.markingsColor, y.fillRect(a.from, l.to, a.to - a.from, l.from - l.to)
                }
            }
            t = I(), i = A.grid.borderWidth;
            for (var f = 0; f < t.length; ++f) {
                var p, d, g, m, x = t[f], v = x.box, b = x.tickLength;
                if (x.show && 0 != x.ticks.length) {
                    for (y.lineWidth = 1, "x" == x.direction ? (p = 0, d = "full" == b ? "top" == x.position ? 0 : T : v.top - w.top + ("top" == x.position ? v.height : 0)) : (d = 0, p = "full" == b ? "left" == x.position ? 0 : M : v.left - w.left + ("left" == x.position ? v.width : 0)), x.innermost || (y.strokeStyle = x.options.color, y.beginPath(), g = m = 0, "x" == x.direction ? g = M + 1 : m = T + 1, 1 == y.lineWidth && ("x" == x.direction ? d = Math.floor(d) + .5 : p = Math.floor(p) + .5), y.moveTo(p, d), y.lineTo(p + g, d + m), y.stroke()), y.strokeStyle = x.options.tickColor, y.beginPath(), e = 0; e < x.ticks.length; ++e) {
                        var k = x.ticks[e].v;
                        g = m = 0, isNaN(k) || k < x.min || k > x.max || "full" == b && ("object" == typeof i && 0 < i[x.position] || 0 < i) && (k == x.min || k == x.max) || ("x" == x.direction ? (p = x.p2c(k), m = "full" == b ? -T : b, "top" == x.position && (m = -m)) : (d = x.p2c(k), g = "full" == b ? -M : b, "left" == x.position && (g = -g)), 1 == y.lineWidth && ("x" == x.direction ? p = Math.floor(p) + .5 : d = Math.floor(d) + .5), y.moveTo(p, d), y.lineTo(p + g, d + m))
                    }
                    y.stroke()
                }
            }
            i && (o = A.grid.borderColor, "object" == typeof i || "object" == typeof o ? ("object" != typeof i && (i = {
                top: i,
                right: i,
                bottom: i,
                left: i
            }), "object" != typeof o && (o = {
                top: o,
                right: o,
                bottom: o,
                left: o
            }), 0 < i.top && (y.strokeStyle = o.top, y.lineWidth = i.top, y.beginPath(), y.moveTo(0 - i.left, 0 - i.top / 2), y.lineTo(M, 0 - i.top / 2), y.stroke()), 0 < i.right && (y.strokeStyle = o.right, y.lineWidth = i.right, y.beginPath(), y.moveTo(M + i.right / 2, 0 - i.top), y.lineTo(M + i.right / 2, T), y.stroke()), 0 < i.bottom && (y.strokeStyle = o.bottom, y.lineWidth = i.bottom, y.beginPath(), y.moveTo(M + i.right, T + i.bottom / 2), y.lineTo(0, T + i.bottom / 2), y.stroke()), 0 < i.left && (y.strokeStyle = o.left, y.lineWidth = i.left, y.beginPath(), y.moveTo(0 - i.left / 2, T + i.bottom), y.lineTo(0 - i.left / 2, 0), y.stroke())) : (y.lineWidth = i, y.strokeStyle = A.grid.borderColor, y.strokeRect(-i / 2, -i / 2, M + i, T + i))), y.restore()
        }

        function b(e) {
            e.lines.show && function (e) {
                function t(e, t, i, o, n) {
                    var r = e.points, a = e.pointsize, l = null, s = null;
                    y.beginPath();
                    for (var c = a; c < r.length; c += a) {
                        var h = r[c - a], u = r[c - a + 1], f = r[c], p = r[c + 1];
                        if (null != h && null != f) {
                            if (u <= p && u < n.min) {
                                if (p < n.min) continue;
                                h = (n.min - u) / (p - u) * (f - h) + h, u = n.min
                            } else if (p <= u && p < n.min) {
                                if (u < n.min) continue;
                                f = (n.min - u) / (p - u) * (f - h) + h, p = n.min
                            }
                            if (p <= u && u > n.max) {
                                if (p > n.max) continue;
                                h = (n.max - u) / (p - u) * (f - h) + h, u = n.max
                            } else if (u <= p && p > n.max) {
                                if (u > n.max) continue;
                                f = (n.max - u) / (p - u) * (f - h) + h, p = n.max
                            }
                            if (h <= f && h < o.min) {
                                if (f < o.min) continue;
                                u = (o.min - h) / (f - h) * (p - u) + u, h = o.min
                            } else if (f <= h && f < o.min) {
                                if (h < o.min) continue;
                                p = (o.min - h) / (f - h) * (p - u) + u, f = o.min
                            }
                            if (f <= h && h > o.max) {
                                if (f > o.max) continue;
                                u = (o.max - h) / (f - h) * (p - u) + u, h = o.max
                            } else if (h <= f && f > o.max) {
                                if (h > o.max) continue;
                                p = (o.max - h) / (f - h) * (p - u) + u, f = o.max
                            }
                            h == l && u == s || y.moveTo(o.p2c(h) + t, n.p2c(u) + i), l = f, s = p, y.lineTo(o.p2c(f) + t, n.p2c(p) + i)
                        }
                    }
                    y.stroke()
                }

                y.save(), y.translate(w.left, w.top), y.lineJoin = "round";
                var i = e.lines.lineWidth, o = e.shadowSize;
                if (0 < i && 0 < o) {
                    y.lineWidth = o, y.strokeStyle = "rgba(0,0,0,0.1)";
                    var n = Math.PI / 18;
                    t(e.datapoints, Math.sin(n) * (i / 2 + o / 2), Math.cos(n) * (i / 2 + o / 2), e.xaxis, e.yaxis), y.lineWidth = o / 2, t(e.datapoints, Math.sin(n) * (i / 2 + o / 4), Math.cos(n) * (i / 2 + o / 4), e.xaxis, e.yaxis)
                }
                y.lineWidth = i, y.strokeStyle = e.color;
                var r = F(e.lines, e.color, 0, T);
                r && (y.fillStyle = r, function (e, t, i) {
                    var o = e.points, n = e.pointsize, r = Math.min(Math.max(0, i.min), i.max), a = 0, l = !1, s = 1,
                        c = 0, h = 0;
                    for (; !(0 < n && a > o.length + n);) {
                        var u = o[(a += n) - n], f = o[a - n + s], p = o[a], d = o[a + s];
                        if (l) {
                            if (0 < n && null != u && null == p) {
                                h = a, n = -n, s = 2;
                                continue
                            }
                            if (n < 0 && a == c + n) {
                                y.fill(), l = !1, s = 1, a = c = h + (n = -n);
                                continue
                            }
                        }
                        if (null != u && null != p) {
                            if (u <= p && u < t.min) {
                                if (p < t.min) continue;
                                f = (t.min - u) / (p - u) * (d - f) + f, u = t.min
                            } else if (p <= u && p < t.min) {
                                if (u < t.min) continue;
                                d = (t.min - u) / (p - u) * (d - f) + f, p = t.min
                            }
                            if (p <= u && u > t.max) {
                                if (p > t.max) continue;
                                f = (t.max - u) / (p - u) * (d - f) + f, u = t.max
                            } else if (u <= p && p > t.max) {
                                if (u > t.max) continue;
                                d = (t.max - u) / (p - u) * (d - f) + f, p = t.max
                            }
                            if (l || (y.beginPath(), y.moveTo(t.p2c(u), i.p2c(r)), l = !0), f >= i.max && d >= i.max) y.lineTo(t.p2c(u), i.p2c(i.max)), y.lineTo(t.p2c(p), i.p2c(i.max)); else if (f <= i.min && d <= i.min) y.lineTo(t.p2c(u), i.p2c(i.min)), y.lineTo(t.p2c(p), i.p2c(i.min)); else {
                                var g = u, m = p;
                                f <= d && f < i.min && d >= i.min ? (u = (i.min - f) / (d - f) * (p - u) + u, f = i.min) : d <= f && d < i.min && f >= i.min && (p = (i.min - f) / (d - f) * (p - u) + u, d = i.min), d <= f && f > i.max && d <= i.max ? (u = (i.max - f) / (d - f) * (p - u) + u, f = i.max) : f <= d && d > i.max && f <= i.max && (p = (i.max - f) / (d - f) * (p - u) + u, d = i.max), u != g && y.lineTo(t.p2c(g), i.p2c(f)), y.lineTo(t.p2c(u), i.p2c(f)), y.lineTo(t.p2c(p), i.p2c(d)), p != m && (y.lineTo(t.p2c(p), i.p2c(d)), y.lineTo(t.p2c(m), i.p2c(d)))
                            }
                        }
                    }
                }(e.datapoints, e.xaxis, e.yaxis));
                0 < i && t(e.datapoints, 0, 0, e.xaxis, e.yaxis);
                y.restore()
            }(e), e.bars.show && function (c) {
                var e;
                switch (y.save(), y.translate(w.left, w.top), y.lineWidth = c.bars.lineWidth, y.strokeStyle = c.color, c.bars.align) {
                    case"left":
                        e = 0;
                        break;
                    case"right":
                        e = -c.bars.barWidth;
                        break;
                    default:
                        e = -c.bars.barWidth / 2
                }
                var t = c.bars.fill ? function (e, t) {
                    return F(c.bars, c.color, e, t)
                } : null;
                (function (e, t, i, o, n, r) {
                    for (var a = e.points, l = e.pointsize, s = 0; s < a.length; s += l) null != a[s] && k(a[s], a[s + 1], a[s + 2], t, i, o, n, r, y, c.bars.horizontal, c.bars.lineWidth)
                })(c.datapoints, e, e + c.bars.barWidth, t, c.xaxis, c.yaxis), y.restore()
            }(e), e.points.show && function (e) {
                function t(e, t, i, o, n, r, a, l) {
                    for (var s = e.points, c = e.pointsize, h = 0; h < s.length; h += c) {
                        var u = s[h], f = s[h + 1];
                        null == u || u < r.min || u > r.max || f < a.min || f > a.max || (y.beginPath(), u = r.p2c(u), f = a.p2c(f) + o, "circle" == l ? y.arc(u, f, t, 0, n ? Math.PI : 2 * Math.PI, !1) : l(y, u, f, t, n), y.closePath(), i && (y.fillStyle = i, y.fill()), y.stroke())
                    }
                }

                y.save(), y.translate(w.left, w.top);
                var i = e.points.lineWidth, o = e.shadowSize, n = e.points.radius, r = e.points.symbol;
                0 == i && (i = 1e-4);
                if (0 < i && 0 < o) {
                    var a = o / 2;
                    y.lineWidth = a, y.strokeStyle = "rgba(0,0,0,0.1)", t(e.datapoints, n, null, a + a / 2, !0, e.xaxis, e.yaxis, r), y.strokeStyle = "rgba(0,0,0,0.2)", t(e.datapoints, n, null, a / 2, !0, e.xaxis, e.yaxis, r)
                }
                y.lineWidth = i, y.strokeStyle = e.color, t(e.datapoints, n, F(e.points, e.color), 0, !1, e.xaxis, e.yaxis, r), y.restore()
            }(e)
        }

        function k(e, t, i, o, n, r, a, l, s, c, h) {
            var u, f, p, d, g, m, x, v, b;
            c ? (v = m = x = !0, g = !1, d = t + o, p = t + n, (f = e) < (u = i) && (b = f, f = u, u = b, m = !(g = !0))) : (g = m = x = !0, v = !1, u = e + o, f = e + n, (d = t) < (p = i) && (b = d, d = p, p = b, x = !(v = !0))), f < a.min || u > a.max || d < l.min || p > l.max || (u < a.min && (u = a.min, g = !1), f > a.max && (f = a.max, m = !1), p < l.min && (p = l.min, v = !1), d > l.max && (d = l.max, x = !1), u = a.p2c(u), p = l.p2c(p), f = a.p2c(f), d = l.p2c(d), r && (s.fillStyle = r(p, d), s.fillRect(u, d, f - u, p - d)), 0 < h && (g || m || x || v) && (s.beginPath(), s.moveTo(u, p), g ? s.lineTo(u, d) : s.moveTo(u, d), x ? s.lineTo(f, d) : s.moveTo(f, d), m ? s.lineTo(f, p) : s.moveTo(f, p), v ? s.lineTo(u, p) : s.moveTo(u, p), s.stroke()))
        }

        function F(e, t, i, o) {
            var n = e.fill;
            if (!n) return null;
            if (e.fillColor) return _(e.fillColor, i, o, t);
            var r = Q.color.parse(t);
            return r.a = "number" == typeof n ? n : .4, r.normalize(), r.toString()
        }

        S.setData = n, S.setupGrid = l, S.draw = s, S.getPlaceholder = function () {
            return m
        }, S.getCanvas = function () {
            return p.element
        }, S.getPlotOffset = function () {
            return w
        }, S.width = function () {
            return M
        }, S.height = function () {
            return T
        }, S.offset = function () {
            var e = h.offset();
            return e.left += w.left, e.top += w.top, e
        }, S.getData = function () {
            return C
        }, S.getAxes = function () {
            var i = {};
            return Q.each(d.concat(g), function (e, t) {
                t && (i[t.direction + (1 != t.n ? t.n : "") + "axis"] = t)
            }), i
        }, S.getXAxes = function () {
            return d
        }, S.getYAxes = function () {
            return g
        }, S.c2p = u, S.p2c = function (e) {
            var t, i, o, n = {};
            for (t = 0; t < d.length; ++t) if ((i = d[t]) && i.used && (o = "x" + i.n, null == e[o] && 1 == i.n && (o = "x"), null != e[o])) {
                n.left = i.p2c(e[o]);
                break
            }
            for (t = 0; t < g.length; ++t) if ((i = g[t]) && i.used && (o = "y" + i.n, null == e[o] && 1 == i.n && (o = "y"), null != e[o])) {
                n.top = i.p2c(e[o]);
                break
            }
            return n
        }, S.getOptions = function () {
            return A
        }, S.highlight = H, S.unhighlight = B, S.triggerRedrawOverlay = q, S.pointOffset = function (e) {
            return {
                left: parseInt(d[x(e, "x") - 1].p2c(+e.x) + w.left, 10),
                top: parseInt(g[x(e, "y") - 1].p2c(+e.y) + w.top, 10)
            }
        }, S.shutdown = r, S.destroy = function () {
            r(), m.removeData("plot").empty(), C = [], d = [], g = [], O = [], S = z = c = y = h = i = p = A = null
        }, S.resize = function () {
            var e = m.width(), t = m.height();
            p.resize(e, t), i.resize(e, t)
        }, S.hooks = z, function () {
            for (var e = {Canvas: V}, t = 0; t < o.length; ++t) {
                var i = o[t];
                i.init(S, e), i.options && Q.extend(!0, A, i.options)
            }
        }(), function (e) {
            Q.extend(!0, A, e), e && e.colors && (A.colors = e.colors);
            null == A.xaxis.color && (A.xaxis.color = Q.color.parse(A.grid.color).scale("a", .22).toString());
            null == A.yaxis.color && (A.yaxis.color = Q.color.parse(A.grid.color).scale("a", .22).toString());
            null == A.xaxis.tickColor && (A.xaxis.tickColor = A.grid.tickColor || A.xaxis.color);
            null == A.yaxis.tickColor && (A.yaxis.tickColor = A.grid.tickColor || A.yaxis.color);
            null == A.grid.borderColor && (A.grid.borderColor = A.grid.color);
            null == A.grid.tickColor && (A.grid.tickColor = Q.color.parse(A.grid.color).scale("a", .22).toString());
            var t, i, o, n = m.css("font-size"), r = n ? +n.replace("px", "") : 13, a = {
                style: m.css("font-style"),
                size: Math.round(.8 * r),
                variant: m.css("font-variant"),
                weight: m.css("font-weight"),
                family: m.css("font-family")
            };
            for (o = A.xaxes.length || 1, t = 0; t < o; ++t) (i = A.xaxes[t]) && !i.tickColor && (i.tickColor = i.color), i = Q.extend(!0, {}, A.xaxis, i), (A.xaxes[t] = i).font && (i.font = Q.extend({}, a, i.font), i.font.color || (i.font.color = i.color), i.font.lineHeight || (i.font.lineHeight = Math.round(1.15 * i.font.size)));
            for (o = A.yaxes.length || 1, t = 0; t < o; ++t) (i = A.yaxes[t]) && !i.tickColor && (i.tickColor = i.color), i = Q.extend(!0, {}, A.yaxis, i), (A.yaxes[t] = i).font && (i.font = Q.extend({}, a, i.font), i.font.color || (i.font.color = i.color), i.font.lineHeight || (i.font.lineHeight = Math.round(1.15 * i.font.size)));
            A.xaxis.noTicks && null == A.xaxis.ticks && (A.xaxis.ticks = A.xaxis.noTicks);
            A.yaxis.noTicks && null == A.yaxis.ticks && (A.yaxis.ticks = A.yaxis.noTicks);
            A.x2axis && (A.xaxes[1] = Q.extend(!0, {}, A.xaxis, A.x2axis), A.xaxes[1].position = "top", null == A.x2axis.min && (A.xaxes[1].min = null), null == A.x2axis.max && (A.xaxes[1].max = null));
            A.y2axis && (A.yaxes[1] = Q.extend(!0, {}, A.yaxis, A.y2axis), A.yaxes[1].position = "right", null == A.y2axis.min && (A.yaxes[1].min = null), null == A.y2axis.max && (A.yaxes[1].max = null));
            A.grid.coloredAreas && (A.grid.markings = A.grid.coloredAreas);
            A.grid.coloredAreasColor && (A.grid.markingsColor = A.grid.coloredAreasColor);
            A.lines && Q.extend(!0, A.series.lines, A.lines);
            A.points && Q.extend(!0, A.series.points, A.points);
            A.bars && Q.extend(!0, A.series.bars, A.bars);
            null != A.shadowSize && (A.series.shadowSize = A.shadowSize);
            null != A.highlightColor && (A.series.highlightColor = A.highlightColor);
            for (t = 0; t < A.xaxes.length; ++t) v(d, t + 1).options = A.xaxes[t];
            for (t = 0; t < A.yaxes.length; ++t) v(g, t + 1).options = A.yaxes[t];
            for (var l in z) A.hooks[l] && A.hooks[l].length && (z[l] = z[l].concat(A.hooks[l]));
            W(z.processOptions, [A])
        }(t), function () {
            m.css("padding", 0).children().filter(function () {
                return !Q(this).hasClass("flot-overlay") && !Q(this).hasClass("flot-base")
            }).remove(), "static" == m.css("position") && m.css("position", "relative");
            p = new V("flot-base", m), i = new V("flot-overlay", m), y = p.context, c = i.context, h = Q(i.element).unbind();
            var e = m.data("plot");
            e && (e.shutdown(), i.clear());
            m.data("plot", S)
        }(), n(e), l(), s(), function () {
            A.grid.hoverable && (h.mousemove(N), h.bind("mouseleave", D));
            A.grid.clickable && h.click(L);
            W(z.bindEvents, [h])
        }();
        var O = [], R = null;

        function N(e) {
            A.grid.hoverable && j("plothover", e, function (e) {
                return 0 != e.hoverable
            })
        }

        function D(e) {
            A.grid.hoverable && j("plothover", e, function (e) {
                return !1
            })
        }

        function L(e) {
            j("plotclick", e, function (e) {
                return 0 != e.clickable
            })
        }

        function j(e, t, i) {
            var o = h.offset(), n = t.pageX - o.left - w.left, r = t.pageY - o.top - w.top, a = u({left: n, top: r});
            a.pageX = t.pageX, a.pageY = t.pageY;
            var l = function (e, t, i) {
                var o, n, r, a = A.grid.mouseActiveRadius, l = a * a + 1, s = null;
                for (o = C.length - 1; 0 <= o; --o) if (i(C[o])) {
                    var c = C[o], h = c.xaxis, u = c.yaxis, f = c.datapoints.points, p = h.c2p(e), d = u.c2p(t),
                        g = a / h.scale, m = a / u.scale;
                    if (r = c.datapoints.pointsize, h.options.inverseTransform && (g = Number.MAX_VALUE), u.options.inverseTransform && (m = Number.MAX_VALUE), c.lines.show || c.points.show) for (n = 0; n < f.length; n += r) {
                        var x = f[n], v = f[n + 1];
                        if (null != x && !(g < x - p || x - p < -g || m < v - d || v - d < -m)) {
                            var b = Math.abs(h.p2c(x) - e), k = Math.abs(u.p2c(v) - t), y = b * b + k * k;
                            y < l && (l = y, s = [o, n / r])
                        }
                    }
                    if (c.bars.show && !s) {
                        var w, M;
                        switch (c.bars.align) {
                            case"left":
                                w = 0;
                                break;
                            case"right":
                                w = -c.bars.barWidth;
                                break;
                            default:
                                w = -c.bars.barWidth / 2
                        }
                        for (M = w + c.bars.barWidth, n = 0; n < f.length; n += r) {
                            x = f[n], v = f[n + 1];
                            var T = f[n + 2];
                            null != x && (C[o].bars.horizontal ? p <= Math.max(T, x) && p >= Math.min(T, x) && v + w <= d && d <= v + M : x + w <= p && p <= x + M && d >= Math.min(T, v) && d <= Math.max(T, v)) && (s = [o, n / r])
                        }
                    }
                }
                return s ? (o = s[0], n = s[1], r = C[o].datapoints.pointsize, {
                    datapoint: C[o].datapoints.points.slice(n * r, (n + 1) * r),
                    dataIndex: n,
                    series: C[o],
                    seriesIndex: o
                }) : null
            }(n, r, i);
            if (l && (l.pageX = parseInt(l.series.xaxis.p2c(l.datapoint[0]) + o.left + w.left, 10), l.pageY = parseInt(l.series.yaxis.p2c(l.datapoint[1]) + o.top + w.top, 10)), A.grid.autoHighlight) {
                for (var s = 0; s < O.length; ++s) {
                    var c = O[s];
                    c.auto != e || l && c.series == l.series && c.point[0] == l.datapoint[0] && c.point[1] == l.datapoint[1] || B(c.series, c.point)
                }
                l && H(l.series, l.datapoint, e)
            }
            m.trigger(e, [a, l])
        }

        function q() {
            var e = A.interaction.redrawOverlayInterval;
            -1 != e ? R || (R = setTimeout(E, e)) : E()
        }

        function E() {
            var e, t;
            for (R = null, c.save(), i.clear(), c.translate(w.left, w.top), e = 0; e < O.length; ++e) (t = O[e]).series.bars.show ? Y(t.series, t.point) : X(t.series, t.point);
            c.restore(), W(z.drawOverlay, [c])
        }

        function H(e, t, i) {
            if ("number" == typeof e && (e = C[e]), "number" == typeof t) {
                var o = e.datapoints.pointsize;
                t = e.datapoints.points.slice(o * t, o * (t + 1))
            }
            var n = G(e, t);
            -1 == n ? (O.push({series: e, point: t, auto: i}), q()) : i || (O[n].auto = !1)
        }

        function B(e, t) {
            if (null == e && null == t) return O = [], void q();
            if ("number" == typeof e && (e = C[e]), "number" == typeof t) {
                var i = e.datapoints.pointsize;
                t = e.datapoints.points.slice(i * t, i * (t + 1))
            }
            var o = G(e, t);
            -1 != o && (O.splice(o, 1), q())
        }

        function G(e, t) {
            for (var i = 0; i < O.length; ++i) {
                var o = O[i];
                if (o.series == e && o.point[0] == t[0] && o.point[1] == t[1]) return i
            }
            return -1
        }

        function X(e, t) {
            var i = t[0], o = t[1], n = e.xaxis, r = e.yaxis,
                a = "string" == typeof e.highlightColor ? e.highlightColor : Q.color.parse(e.color).scale("a", .5).toString();
            if (!(i < n.min || i > n.max || o < r.min || o > r.max)) {
                var l = e.points.radius + e.points.lineWidth / 2;
                c.lineWidth = l, c.strokeStyle = a;
                var s = 1.5 * l;
                i = n.p2c(i), o = r.p2c(o), c.beginPath(), "circle" == e.points.symbol ? c.arc(i, o, s, 0, 2 * Math.PI, !1) : e.points.symbol(c, i, o, s, !1), c.closePath(), c.stroke()
            }
        }

        function Y(e, t) {
            var i,
                o = "string" == typeof e.highlightColor ? e.highlightColor : Q.color.parse(e.color).scale("a", .5).toString(),
                n = o;
            switch (e.bars.align) {
                case"left":
                    i = 0;
                    break;
                case"right":
                    i = -e.bars.barWidth;
                    break;
                default:
                    i = -e.bars.barWidth / 2
            }
            c.lineWidth = e.bars.lineWidth, c.strokeStyle = o, k(t[0], t[1], t[2] || 0, i, i + e.bars.barWidth, function () {
                return n
            }, e.xaxis, e.yaxis, c, e.bars.horizontal, e.bars.lineWidth)
        }

        function _(e, t, i, o) {
            if ("string" == typeof e) return e;
            for (var n = y.createLinearGradient(0, i, 0, t), r = 0, a = e.colors.length; r < a; ++r) {
                var l = e.colors[r];
                if ("string" != typeof l) {
                    var s = Q.color.parse(o);
                    null != l.brightness && (s = s.scale("rgb", l.brightness)), null != l.opacity && (s.a *= l.opacity), l = s.toString()
                }
                n.addColorStop(r / (a - 1), l)
            }
            return n
        }
    }

    Q.fn.detach || (Q.fn.detach = function () {
        return this.each(function () {
            this.parentNode && this.parentNode.removeChild(this)
        })
    }), V.prototype.resize = function (e, t) {
        if (e <= 0 || t <= 0) throw new Error("Invalid dimensions for plot, width = " + e + ", height = " + t);
        var i = this.element, o = this.context, n = this.pixelRatio;
        this.width != e && (i.width = e * n, i.style.width = e + "px", this.width = e), this.height != t && (i.height = t * n, i.style.height = t + "px", this.height = t), o.restore(), o.save(), o.scale(n, n)
    }, V.prototype.clear = function () {
        this.context.clearRect(0, 0, this.width, this.height)
    }, V.prototype.render = function () {
        var e = this._textCache;
        for (var t in e) if (p.call(e, t)) {
            var i = this.getTextLayer(t), o = e[t];
            for (var n in i.hide(), o) if (p.call(o, n)) {
                var r = o[n];
                for (var a in r) if (p.call(r, a)) {
                    for (var l, s = r[a].positions, c = 0; l = s[c]; c++) l.active ? l.rendered || (i.append(l.element), l.rendered = !0) : (s.splice(c--, 1), l.rendered && l.element.detach());
                    0 == s.length && delete r[a]
                }
            }
            i.show()
        }
    }, V.prototype.getTextLayer = function (e) {
        var t = this.text[e];
        return null == t && (null == this.textContainer && (this.textContainer = Q("<div class='flot-text'></div>").css({
            position: "absolute",
            top: 0,
            left: 0,
            bottom: 0,
            right: 0,
            "font-size": "smaller",
            color: "#545454"
        }).insertAfter(this.element)), t = this.text[e] = Q("<div></div>").addClass(e).css({
            position: "absolute",
            top: 0,
            left: 0,
            bottom: 0,
            right: 0
        }).appendTo(this.textContainer)), t
    }, V.prototype.getTextInfo = function (e, t, i, o, n) {
        var r, a, l, s;
        if (t = "" + t, r = "object" == typeof i ? i.style + " " + i.variant + " " + i.weight + " " + i.size + "px/" + i.lineHeight + "px " + i.family : i, null == (a = this._textCache[e]) && (a = this._textCache[e] = {}), null == (l = a[r]) && (l = a[r] = {}), null == (s = l[t])) {
            var c = Q("<div></div>").html(t).css({
                position: "absolute",
                "max-width": n,
                top: -9999
            }).appendTo(this.getTextLayer(e));
            "object" == typeof i ? c.css({
                font: r,
                color: i.color
            }) : "string" == typeof i && c.addClass(i), s = l[t] = {
                width: c.outerWidth(!0),
                height: c.outerHeight(!0),
                element: c,
                positions: []
            }, c.detach()
        }
        return s
    }, V.prototype.addText = function (e, t, i, o, n, r, a, l, s) {
        var c = this.getTextInfo(e, o, n, r, a), h = c.positions;
        "center" == l ? t -= c.width / 2 : "right" == l && (t -= c.width), "middle" == s ? i -= c.height / 2 : "bottom" == s && (i -= c.height);
        for (var u, f = 0; u = h[f]; f++) if (u.x == t && u.y == i) return void(u.active = !0);
        u = {
            active: !0,
            rendered: !1,
            element: h.length ? c.element.clone() : c.element,
            x: t,
            y: i
        }, h.push(u), u.element.css({top: Math.round(i), left: Math.round(t), "text-align": l})
    }, V.prototype.removeText = function (e, t, i, o, n, r) {
        if (null == o) {
            var a = this._textCache[e];
            if (null != a) for (var l in a) if (p.call(a, l)) {
                var s = a[l];
                for (var c in s) if (p.call(s, c)) for (var h = s[c].positions, u = 0; f = h[u]; u++) f.active = !1
            }
        } else {
            var f;
            for (h = this.getTextInfo(e, o, n, r).positions, u = 0; f = h[u]; u++) f.x == t && f.y == i && (f.active = !1)
        }
    }, Q.plot = function (e, t, i) {
        return new o(Q(e), t, i, Q.plot.plugins)
    }, Q.plot.version = "0.8.3", Q.plot.plugins = [], Q.fn.plot = function (e, t) {
        return this.each(function () {
            Q.plot(this, e, t)
        })
    }
}(jQuery), function (a, l, s) {
    "$:nomunge";
    var c, h = [], u = a.resize = a.extend(a.resize, {}), f = !1, i = "setTimeout", p = "resize",
        d = p + "-special-event", g = "pendingDelay", o = "activeDelay", n = "throttleWindow";

    function m(e) {
        !0 === f && (f = e || 1);
        for (var t = h.length - 1; 0 <= t; t--) {
            var i = a(h[t]);
            if (i[0] == l || i.is(":visible")) {
                var o = i.width(), n = i.height(), r = i.data(d);
                !r || o === r.w && n === r.h || (i.trigger(p, [r.w = o, r.h = n]), f = e || !0)
            } else (r = i.data(d)).w = 0, r.h = 0
        }
        null !== c && (f && (null == e || e - f < 1e3) ? c = l.requestAnimationFrame(m) : (c = setTimeout(m, u[g]), f = !1))
    }

    u[g] = 200, u[o] = 20, u[n] = !0, a.event.special[p] = {
        setup: function () {
            if (!u[n] && this[i]) return !1;
            var e = a(this);
            h.push(this), e.data(d, {w: e.width(), h: e.height()}), 1 === h.length && (c = s, m())
        }, teardown: function () {
            if (!u[n] && this[i]) return !1;
            for (var e = a(this), t = h.length - 1; 0 <= t; t--) if (h[t] == this) {
                h.splice(t, 1);
                break
            }
            e.removeData(d), h.length || (f ? cancelAnimationFrame(c) : clearTimeout(c), c = null)
        }, add: function (e) {
            if (!u[n] && this[i]) return !1;
            var r;

            function t(e, t, i) {
                var o = a(this), n = o.data(d) || {};
                n.w = t !== s ? t : o.width(), n.h = i !== s ? i : o.height(), r.apply(this, arguments)
            }

            if (a.isFunction(e)) return r = e, t;
            r = e.handler, e.handler = t
        }
    }, l.requestAnimationFrame || (l.requestAnimationFrame = l.webkitRequestAnimationFrame || l.mozRequestAnimationFrame || l.oRequestAnimationFrame || l.msRequestAnimationFrame || function (e, t) {
        return l.setTimeout(function () {
            e((new Date).getTime())
        }, u[o])
    }), l.cancelAnimationFrame || (l.cancelAnimationFrame = l.webkitCancelRequestAnimationFrame || l.mozCancelRequestAnimationFrame || l.oCancelRequestAnimationFrame || l.msCancelRequestAnimationFrame || clearTimeout)
}(jQuery, this), jQuery.plot.plugins.push({
    init: function (t) {
        function i() {
            var e = t.getPlaceholder();
            0 != e.width() && 0 != e.height() && (t.resize(), t.setupGrid(), t.draw())
        }

        t.hooks.bindEvents.push(function (e, t) {
            e.getPlaceholder().resize(i)
        }), t.hooks.shutdown.push(function (e, t) {
            e.getPlaceholder().unbind("resize", i)
        })
    }, options: {}, name: "resize", version: "1.0"
}), function (l) {
    function t(e, t, i, o) {
        var n = "categories" == t.xaxis.options.mode, r = "categories" == t.yaxis.options.mode;
        if (n || r) {
            var a = o.format;
            if (!a) {
                var l = t;
                if ((a = []).push({x: !0, number: !0, required: !0}), a.push({
                    y: !0,
                    number: !0,
                    required: !0
                }), l.bars.show || l.lines.show && l.lines.fill) {
                    var s = !!(l.bars.show && l.bars.zero || l.lines.show && l.lines.zero);
                    a.push({
                        y: !0,
                        number: !0,
                        required: !1,
                        defaultValue: 0,
                        autoscale: s
                    }), l.bars.horizontal && (delete a[a.length - 1].y, a[a.length - 1].x = !0)
                }
                o.format = a
            }
            for (var c = 0; c < a.length; ++c) a[c].x && n && (a[c].number = !1), a[c].y && r && (a[c].number = !1)
        }
    }

    function s(e) {
        var t = [];
        for (var i in e.categories) {
            var o = e.categories[i];
            o >= e.min && o <= e.max && t.push([o, i])
        }
        return t.sort(function (e, t) {
            return e[0] - t[0]
        }), t
    }

    function o(e, t, i) {
        if ("categories" == e[t].options.mode) {
            if (!e[t].categories) {
                var o = {}, n = e[t].options.categories || {};
                if (l.isArray(n)) for (var r = 0; r < n.length; ++r) o[n[r]] = r; else for (var a in n) o[a] = n[a];
                e[t].categories = o
            }
            e[t].options.ticks || (e[t].options.ticks = s), function (e, t, i) {
                for (var o = e.points, n = e.pointsize, r = e.format, a = t.charAt(0), l = function (e) {
                    var t = -1;
                    for (var i in e) e[i] > t && (t = e[i]);
                    return t + 1
                }(i), s = 0; s < o.length; s += n) if (null != o[s]) for (var c = 0; c < n; ++c) {
                    var h = o[s + c];
                    null != h && r[c][a] && (h in i || (i[h] = l, ++l), o[s + c] = i[h])
                }
            }(i, t, e[t].categories)
        }
    }

    function i(e, t, i) {
        o(t, "xaxis", i), o(t, "yaxis", i)
    }

    l.plot.plugins.push({
        init: function (e) {
            e.hooks.processRawData.push(t), e.hooks.processDatapoints.push(i)
        }, options: {xaxis: {categories: null}, yaxis: {categories: null}}, name: "categories", version: "1.0"
    })
}(jQuery), function (w) {
    var M = 10, T = .95;
    var e = {
        series: {
            pie: {
                show: !1,
                radius: "auto",
                innerRadius: 0,
                startAngle: 1.5,
                tilt: 1,
                shadow: {left: 5, top: 15, alpha: .02},
                offset: {top: 0, left: "auto"},
                stroke: {color: "#fff", width: 1},
                label: {
                    show: "auto", formatter: function (e, t) {
                        return "<div style='font-size:x-small;text-align:center;padding:2px;color:" + t.color + ";'>" + e + "<br/>" + Math.round(t.percent) + "%</div>"
                    }, radius: 1, background: {color: null, opacity: 0}, threshold: 0
                },
                combine: {threshold: -1, color: null, label: "Other"},
                highlight: {opacity: .5}
            }
        }
    };
    w.plot.plugins.push({
        init: function (h) {
            var r = null, v = null, b = null, u = null, k = null, y = null, s = !1, f = null, p = [];

            function c(e) {
                if (0 < b.series.pie.innerRadius) {
                    e.save();
                    var t = 1 < b.series.pie.innerRadius ? b.series.pie.innerRadius : u * b.series.pie.innerRadius;
                    e.globalCompositeOperation = "destination-out", e.beginPath(), e.fillStyle = b.series.pie.stroke.color, e.arc(0, 0, t, 0, 2 * Math.PI, !1), e.fill(), e.closePath(), e.restore(), e.save(), e.beginPath(), e.strokeStyle = b.series.pie.stroke.color, e.arc(0, 0, t, 0, 2 * Math.PI, !1), e.stroke(), e.closePath(), e.restore()
                }
            }

            function d(e, t) {
                for (var i = !1, o = -1, n = e.length, r = n - 1; ++o < n; r = o) (e[o][1] <= t[1] && t[1] < e[r][1] || e[r][1] <= t[1] && t[1] < e[o][1]) && t[0] < (e[r][0] - e[o][0]) * (t[1] - e[o][1]) / (e[r][1] - e[o][1]) + e[o][0] && (i = !i);
                return i
            }

            function o(e) {
                t("plothover", e)
            }

            function n(e) {
                t("plotclick", e)
            }

            function t(e, t) {
                var i, o, n, r = h.offset(), a = function (e, t) {
                    for (var i, o, n = h.getData(), r = h.getOptions(), a = 1 < r.series.pie.radius ? r.series.pie.radius : u * r.series.pie.radius, l = 0; l < n.length; ++l) {
                        var s = n[l];
                        if (s.pie.show) {
                            if (f.save(), f.beginPath(), f.moveTo(0, 0), f.arc(0, 0, a, s.startAngle, s.startAngle + s.angle / 2, !1), f.arc(0, 0, a, s.startAngle + s.angle / 2, s.startAngle + s.angle, !1), f.closePath(), i = e - k, o = t - y, f.isPointInPath) {
                                if (f.isPointInPath(e - k, t - y)) return f.restore(), {
                                    datapoint: [s.percent, s.data],
                                    dataIndex: 0,
                                    series: s,
                                    seriesIndex: l
                                }
                            } else if (d([[0, 0], [a * Math.cos(s.startAngle), a * Math.sin(s.startAngle)], [a * Math.cos(s.startAngle + s.angle / 4), a * Math.sin(s.startAngle + s.angle / 4)], [a * Math.cos(s.startAngle + s.angle / 2), a * Math.sin(s.startAngle + s.angle / 2)], [a * Math.cos(s.startAngle + s.angle / 1.5), a * Math.sin(s.startAngle + s.angle / 1.5)], [a * Math.cos(s.startAngle + s.angle), a * Math.sin(s.startAngle + s.angle)]], [i, o])) return f.restore(), {
                                datapoint: [s.percent, s.data],
                                dataIndex: 0,
                                series: s,
                                seriesIndex: l
                            };
                            f.restore()
                        }
                    }
                    return null
                }(parseInt(t.pageX - r.left), parseInt(t.pageY - r.top));
                if (b.grid.autoHighlight) for (var l = 0; l < p.length; ++l) {
                    var s = p[l];
                    s.auto != e || a && s.series == a.series || g(s.series)
                }
                a && (i = a.series, o = e, -1 == (n = m(i)) ? (p.push({
                    series: i,
                    auto: o
                }), h.triggerRedrawOverlay()) : o || (p[n].auto = !1));
                var c = {pageX: t.pageX, pageY: t.pageY};
                v.trigger(e, [c, a])
            }

            function g(e) {
                null == e && (p = [], h.triggerRedrawOverlay());
                var t = m(e);
                -1 != t && (p.splice(t, 1), h.triggerRedrawOverlay())
            }

            function m(e) {
                for (var t = 0; t < p.length; ++t) if (p[t].series == e) return t;
                return -1
            }

            h.hooks.processOptions.push(function (e, t) {
                t.series.pie.show && (t.grid.show = !1, "auto" == t.series.pie.label.show && (t.legend.show ? t.series.pie.label.show = !1 : t.series.pie.label.show = !0), "auto" == t.series.pie.radius && (t.series.pie.label.show ? t.series.pie.radius = .75 : t.series.pie.radius = 1), 1 < t.series.pie.tilt ? t.series.pie.tilt = 1 : t.series.pie.tilt < 0 && (t.series.pie.tilt = 0))
            }), h.hooks.bindEvents.push(function (e, t) {
                var i = e.getOptions();
                i.series.pie.show && (i.grid.hoverable && t.unbind("mousemove").mousemove(o), i.grid.clickable && t.unbind("click").click(n))
            }), h.hooks.processDatapoints.push(function (e, t, i, o) {
                var n;
                e.getOptions().series.pie.show && (n = e, s || (s = !0, r = n.getCanvas(), v = w(r).parent(), b = n.getOptions(), n.setData(function (e) {
                    for (var t = 0, i = 0, o = 0, n = b.series.pie.combine.color, r = [], a = 0; a < e.length; ++a) {
                        var l = e[a].data;
                        w.isArray(l) && 1 == l.length && (l = l[0]), w.isArray(l) ? !isNaN(parseFloat(l[1])) && isFinite(l[1]) ? l[1] = +l[1] : l[1] = 0 : l = !isNaN(parseFloat(l)) && isFinite(l) ? [1, +l] : [1, 0], e[a].data = [l]
                    }
                    for (var a = 0; a < e.length; ++a) t += e[a].data[0][1];
                    for (var a = 0; a < e.length; ++a) {
                        var l = e[a].data[0][1];
                        l / t <= b.series.pie.combine.threshold && (i += l, o++, n || (n = e[a].color))
                    }
                    for (var a = 0; a < e.length; ++a) {
                        var l = e[a].data[0][1];
                        (o < 2 || l / t > b.series.pie.combine.threshold) && r.push(w.extend(e[a], {
                            data: [[1, l]],
                            color: e[a].color,
                            label: e[a].label,
                            angle: l * Math.PI * 2 / t,
                            percent: l / (t / 100)
                        }))
                    }
                    return 1 < o && r.push({
                        data: [[1, i]],
                        color: n,
                        label: b.series.pie.combine.label,
                        angle: i * Math.PI * 2 / t,
                        percent: i / (t / 100)
                    }), r
                }(n.getData()))))
            }), h.hooks.drawOverlay.push(function (e, t) {
                e.getOptions().series.pie.show && function (e, t) {
                    var i = e.getOptions(), o = 1 < i.series.pie.radius ? i.series.pie.radius : u * i.series.pie.radius;
                    t.save(), t.translate(k, y), t.scale(1, i.series.pie.tilt);
                    for (var n = 0; n < p.length; ++n) r(p[n].series);

                    function r(e) {
                        e.angle <= 0 || isNaN(e.angle) || (t.fillStyle = "rgba(255, 255, 255, " + i.series.pie.highlight.opacity + ")", t.beginPath(), 1e-9 < Math.abs(e.angle - 2 * Math.PI) && t.moveTo(0, 0), t.arc(0, 0, o, e.startAngle, e.startAngle + e.angle / 2, !1), t.arc(0, 0, o, e.startAngle + e.angle / 2, e.startAngle + e.angle, !1), t.closePath(), t.fill())
                    }

                    c(t), t.restore()
                }(e, t)
            }), h.hooks.draw.push(function (e, t) {
                e.getOptions().series.pie.show && function (e, t) {
                    if (v) {
                        var m = e.getPlaceholder().width(), x = e.getPlaceholder().height(),
                            i = v.children().filter(".legend").children().width() || 0;
                        f = t, s = !1, u = Math.min(m, x / b.series.pie.tilt) / 2, y = x / 2 + b.series.pie.offset.top, k = m / 2, "auto" == b.series.pie.offset.left ? (b.legend.position.match("w") ? k += i / 2 : k -= i / 2, k < u ? k = u : m - u < k && (k = m - u)) : k += b.series.pie.offset.left;
                        for (var a = e.getData(), o = 0; 0 < o && (u *= T), o += 1, n(), b.series.pie.tilt <= .8 && r(), !l() && o < M;) ;
                        M <= o && (n(), v.prepend("<div class='error'>Could not draw pie with labels contained inside canvas</div>")), e.setSeries && e.insertLegend && (e.setSeries(a), e.insertLegend())
                    }

                    function n() {
                        f.clearRect(0, 0, m, x), v.children().filter(".pieLabel, .pieLabelBackground").remove()
                    }

                    function r() {
                        var e = b.series.pie.shadow.left, t = b.series.pie.shadow.top, i = b.series.pie.shadow.alpha,
                            o = 1 < b.series.pie.radius ? b.series.pie.radius : u * b.series.pie.radius;
                        if (!(m / 2 - e <= o || o * b.series.pie.tilt >= x / 2 - t || o <= 10)) {
                            f.save(), f.translate(e, t), f.globalAlpha = i, f.fillStyle = "#000", f.translate(k, y), f.scale(1, b.series.pie.tilt);
                            for (var n = 1; n <= 10; n++) f.beginPath(), f.arc(0, 0, o, 0, 2 * Math.PI, !1), f.fill(), o -= n;
                            f.restore()
                        }
                    }

                    function l() {
                        var o = Math.PI * b.series.pie.startAngle,
                            n = 1 < b.series.pie.radius ? b.series.pie.radius : u * b.series.pie.radius;
                        f.save(), f.translate(k, y), f.scale(1, b.series.pie.tilt), f.save();
                        for (var r = o, e = 0; e < a.length; ++e) a[e].startAngle = r, t(a[e].angle, a[e].color, !0);
                        if (f.restore(), 0 < b.series.pie.stroke.width) {
                            f.save(), f.lineWidth = b.series.pie.stroke.width, r = o;
                            for (var e = 0; e < a.length; ++e) t(a[e].angle, b.series.pie.stroke.color, !1);
                            f.restore()
                        }
                        return c(f), f.restore(), !b.series.pie.label.show || function () {
                            for (var e = o, g = 1 < b.series.pie.label.radius ? b.series.pie.label.radius : u * b.series.pie.label.radius, t = 0; t < a.length; ++t) {
                                if (a[t].percent >= 100 * b.series.pie.label.threshold && !i(a[t], e, t)) return !1;
                                e += a[t].angle
                            }
                            return !0;

                            function i(e, t, i) {
                                if (0 == e.data[0][1]) return !0;
                                var o, n = b.legend.labelFormatter, r = b.series.pie.label.formatter;
                                o = n ? n(e.label, e) : e.label, r && (o = r(o, e));
                                var a = (t + e.angle + t) / 2, l = k + Math.round(Math.cos(a) * g),
                                    s = y + Math.round(Math.sin(a) * g) * b.series.pie.tilt,
                                    c = "<span class='pieLabel' id='pieLabel" + i + "' style='position:absolute;top:" + s + "px;left:" + l + "px;'>" + o + "</span>";
                                v.append(c);
                                var h = v.children("#pieLabel" + i), u = s - h.height() / 2, f = l - h.width() / 2;
                                if (h.css("top", u), h.css("left", f), 0 < 0 - u || 0 < 0 - f || x - (u + h.height()) < 0 || m - (f + h.width()) < 0) return !1;
                                if (0 != b.series.pie.label.background.opacity) {
                                    var p = b.series.pie.label.background.color;
                                    null == p && (p = e.color);
                                    var d = "top:" + u + "px;left:" + f + "px;";
                                    w("<div class='pieLabelBackground' style='position:absolute;width:" + h.width() + "px;height:" + h.height() + "px;" + d + "background-color:" + p + ";'></div>").css("opacity", b.series.pie.label.background.opacity).insertBefore(h)
                                }
                                return !0
                            }
                        }();

                        function t(e, t, i) {
                            e <= 0 || isNaN(e) || (i ? f.fillStyle = t : (f.strokeStyle = t, f.lineJoin = "round"), f.beginPath(), 1e-9 < Math.abs(e - 2 * Math.PI) && f.moveTo(0, 0), f.arc(0, 0, n, r, r + e / 2, !1), f.arc(0, 0, n, r + e / 2, r + e, !1), f.closePath(), r += e, i ? f.fill() : f.stroke())
                        }
                    }
                }(e, t)
            })
        }, options: e, name: "pie", version: "1.1"
    })
}(jQuery), jQuery.plot.plugins.push({
    init: function (e) {
        e.hooks.processDatapoints.push(function (e, t, i) {
            if (null != t.stack && !1 !== t.stack) {
                var o = function (e, t) {
                    for (var i = null, o = 0; o < t.length && e != t[o]; ++o) t[o].stack == e.stack && (i = t[o]);
                    return i
                }(t, e.getData());
                if (o) {
                    for (var n, r, a, l, s, c, h, u, f = i.pointsize, p = i.points, d = o.datapoints.pointsize, g = o.datapoints.points, m = [], x = t.lines.show, v = t.bars.horizontal, b = 2 < f && (v ? i.format[2].x : i.format[2].y), k = x && t.lines.steps, y = !0, w = v ? 1 : 0, M = v ? 0 : 1, T = 0, C = 0; !(T >= p.length);) {
                        if (h = m.length, null == p[T]) {
                            for (u = 0; u < f; ++u) m.push(p[T + u]);
                            T += f
                        } else if (C >= g.length) {
                            if (!x) for (u = 0; u < f; ++u) m.push(p[T + u]);
                            T += f
                        } else if (null == g[C]) {
                            for (u = 0; u < f; ++u) m.push(null);
                            y = !0, C += d
                        } else {
                            if (n = p[T + w], r = p[T + M], l = g[C + w], s = g[C + M], c = 0, n == l) {
                                for (u = 0; u < f; ++u) m.push(p[T + u]);
                                m[h + M] += s, c = s, T += f, C += d
                            } else if (l < n) {
                                if (x && 0 < T && null != p[T - f]) {
                                    for (a = r + (p[T - f + M] - r) * (l - n) / (p[T - f + w] - n), m.push(l), m.push(a + s), u = 2; u < f; ++u) m.push(p[T + u]);
                                    c = s
                                }
                                C += d
                            } else {
                                if (y && x) {
                                    T += f;
                                    continue
                                }
                                for (u = 0; u < f; ++u) m.push(p[T + u]);
                                x && 0 < C && null != g[C - d] && (c = s + (g[C - d + M] - s) * (n - l) / (g[C - d + w] - l)), m[h + M] += c, T += f
                            }
                            y = !1, h != m.length && b && (m[h + 2] += c)
                        }
                        if (k && h != m.length && 0 < h && null != m[h] && m[h] != m[h - f] && m[h + 1] != m[h - f + 1]) {
                            for (u = 0; u < f; ++u) m[h + f + u] = m[h + u];
                            m[h + 1] = m[h - f + 1]
                        }
                    }
                    i.points = m
                }
            }
        })
    }, options: {series: {stack: null}}, name: "stack", version: "1.2"
}), jQuery.plot.plugins.push({
    init: function (i) {
        var l = {x: -1, y: -1, locked: !1};

        function o(e) {
            l.locked || -1 != l.x && (l.x = -1, i.triggerRedrawOverlay())
        }

        function n(e) {
            if (!l.locked) if (i.getSelection && i.getSelection()) l.x = -1; else {
                var t = i.offset();
                l.x = Math.max(0, Math.min(e.pageX - t.left, i.width())), l.y = Math.max(0, Math.min(e.pageY - t.top, i.height())), i.triggerRedrawOverlay()
            }
        }

        i.setCrosshair = function (e) {
            if (e) {
                var t = i.p2c(e);
                l.x = Math.max(0, Math.min(t.left, i.width())), l.y = Math.max(0, Math.min(t.top, i.height()))
            } else l.x = -1;
            i.triggerRedrawOverlay()
        }, i.clearCrosshair = i.setCrosshair, i.lockCrosshair = function (e) {
            e && i.setCrosshair(e), l.locked = !0
        }, i.unlockCrosshair = function () {
            l.locked = !1
        }, i.hooks.bindEvents.push(function (e, t) {
            e.getOptions().crosshair.mode && (t.mouseout(o), t.mousemove(n))
        }), i.hooks.drawOverlay.push(function (e, t) {
            var i = e.getOptions().crosshair;
            if (i.mode) {
                var o = e.getPlotOffset();
                if (t.save(), t.translate(o.left, o.top), -1 != l.x) {
                    var n = e.getOptions().crosshair.lineWidth % 2 ? .5 : 0;
                    if (t.strokeStyle = i.color, t.lineWidth = i.lineWidth, t.lineJoin = "round", t.beginPath(), -1 != i.mode.indexOf("x")) {
                        var r = Math.floor(l.x) + n;
                        t.moveTo(r, 0), t.lineTo(r, e.height())
                    }
                    if (-1 != i.mode.indexOf("y")) {
                        var a = Math.floor(l.y) + n;
                        t.moveTo(0, a), t.lineTo(e.width(), a)
                    }
                    t.stroke()
                }
                t.restore()
            }
        }), i.hooks.shutdown.push(function (e, t) {
            t.unbind("mouseout", o), t.unbind("mousemove", n)
        })
    },
    options: {crosshair: {mode: null, color: "rgba(170, 0, 0, 0.80)", lineWidth: 1}},
    name: "crosshair",
    version: "1.0"
});