! function() {
    "use strict";

    function t(t, e, s, n) {
        var i, o = arguments.length,
            r = o < 3 ? e : null === n ? n = Object.getOwnPropertyDescriptor(e, s) : n;
        if ("object" == typeof Reflect && "function" == typeof Reflect.decorate) r = Reflect.decorate(t, e, s, n);
        else
            for (var a = t.length - 1; a >= 0; a--)(i = t[a]) && (r = (o < 3 ? i(r) : o > 3 ? i(e, s, r) : i(e, s)) || r);
        return o > 3 && r && Object.defineProperty(e, s, r), r
    }

    function e(t, e, s, n) {
        return new(s || (s = Promise))(function(i, o) {
            function r(t) {
                try {
                    c(n.next(t))
                } catch (t) {
                    o(t)
                }
            }

            function a(t) {
                try {
                    c(n.throw(t))
                } catch (t) {
                    o(t)
                }
            }

            function c(t) {
                t.done ? i(t.value) : new s(function(e) {
                    e(t.value)
                }).then(r, a)
            }
            c((n = n.apply(t, e || [])).next())
        })
    }! function() {
        window.WebComponents = window.WebComponents || {};
        var t = [];
        if ((!("attachShadow" in Element.prototype && "getRootNode" in Element.prototype) || window.ShadyDOM && window.ShadyDOM.force) && t.push("sd"), window.customElements && !window.customElements.forcePolyfill || t.push("ce"), "content" in document.createElement("template") && window.Promise && Array.from && document.createDocumentFragment().cloneNode() instanceof DocumentFragment || (t = ["lite"]), t.length) {
            var e = document.createElement("script"),
                s = "node_modules/@webcomponents/webcomponentsjs/" + ("webcomponents-" + t.join("-") + ".js");
            e.src = s, "loading" === document.readyState && "import" in document.createElement("link") ? document.write(e.outerHTML) : document.head.appendChild(e)
        } else {
            var n = function() {
                window.WebComponents.ready = !0, requestAnimationFrame(function() {
                    document.dispatchEvent(new CustomEvent("WebComponentsReady", {
                        bubbles: !0
                    }))
                })
            };
            "loading" !== document.readyState ? n() : document.addEventListener("readystatechange", function t() {
                n(), document.removeEventListener("readystatechange", t)
            })
        }
    }();
    const s = new WeakMap,
        n = t => "function" == typeof t && s.has(t),
        i = void 0 !== window.customElements && void 0 !== window.customElements.polyfillWrapFlushCallback,
        o = (t, e, s = null) => {
            let n = e;
            for (; n !== s;) {
                const e = n.nextSibling;
                t.removeChild(n), n = e
            }
        },
        r = {},
        a = `{{lit-${String(Math.random()).slice(2)}}}`,
        c = `\x3c!--${a}--\x3e`,
        l = new RegExp(`${a}|${c}`),
        h = (() => {
            const t = document.createElement("div");
            return t.setAttribute("style", "{{bad value}}"), "{{bad value}}" !== t.getAttribute("style")
        })();
    class d {
        constructor(t, e) {
            this.parts = [], this.element = e;
            let s = -1,
                n = 0;
            const i = [],
                o = e => {
                    const r = e.content,
                        c = document.createTreeWalker(r, 133, null, !1);
                    let d, u;
                    for (; c.nextNode();) {
                        s++, d = u;
                        const e = u = c.currentNode;
                        if (1 === e.nodeType) {
                            if (e.hasAttributes()) {
                                const i = e.attributes;
                                let o = 0;
                                for (let t = 0; t < i.length; t++) i[t].value.indexOf(a) >= 0 && o++;
                                for (; o-- > 0;) {
                                    const i = t.strings[n],
                                        o = m.exec(i)[2],
                                        r = h && "style" === o ? "style$" : /^[a-zA-Z-]*$/.test(o) ? o : o.toLowerCase(),
                                        a = e.getAttribute(r).split(l);
                                    this.parts.push({
                                        type: "attribute",
                                        index: s,
                                        name: o,
                                        strings: a
                                    }), e.removeAttribute(r), n += a.length - 1
                                }
                            }
                            "TEMPLATE" === e.tagName && o(e)
                        } else if (3 === e.nodeType) {
                            const t = e.nodeValue;
                            if (t.indexOf(a) < 0) continue;
                            const o = e.parentNode,
                                r = t.split(l),
                                c = r.length - 1;
                            n += c;
                            for (let t = 0; t < c; t++) o.insertBefore("" === r[t] ? p() : document.createTextNode(r[t]), e), this.parts.push({
                                type: "node",
                                index: s++
                            });
                            o.insertBefore("" === r[c] ? p() : document.createTextNode(r[c]), e), i.push(e)
                        } else if (8 === e.nodeType)
                            if (e.nodeValue === a) {
                                const t = e.parentNode,
                                    o = e.previousSibling;
                                null === o || o !== d || o.nodeType !== Node.TEXT_NODE ? t.insertBefore(p(), e) : s--, this.parts.push({
                                    type: "node",
                                    index: s++
                                }), i.push(e), null === e.nextSibling ? t.insertBefore(p(), e) : s--, u = d, n++
                            } else {
                                let t = -1;
                                for (; - 1 !== (t = e.nodeValue.indexOf(a, t + 1));) this.parts.push({
                                    type: "node",
                                    index: -1
                                })
                            }
                    }
                };
            o(e);
            for (const t of i) t.parentNode.removeChild(t)
        }
    }
    const u = t => -1 !== t.index,
        p = () => document.createComment(""),
        m = /([ \x09\x0a\x0c\x0d])([^\0-\x1F\x7F-\x9F \x09\x0a\x0c\x0d"'>=\/]+)([ \x09\x0a\x0c\x0d]*=[ \x09\x0a\x0c\x0d]*(?:[^ \x09\x0a\x0c\x0d"'`<>=]*|"[^"]*|'[^']*))$/;
    class f {
        constructor(t, e, s) {
            this._parts = [], this.template = t, this.processor = e, this.options = s
        }
        update(t) {
            let e = 0;
            for (const s of this._parts) void 0 !== s && s.setValue(t[e]), e++;
            for (const t of this._parts) void 0 !== t && t.commit()
        }
        _clone() {
            const t = i ? this.template.element.content.cloneNode(!0) : document.importNode(this.template.element.content, !0),
                e = this.template.parts;
            let s = 0,
                n = 0;
            const o = t => {
                const i = document.createTreeWalker(t, 133, null, !1);
                let r = i.nextNode();
                for (; s < e.length && null !== r;) {
                    const t = e[s];
                    if (u(t))
                        if (n === t.index) {
                            if ("node" === t.type) {
                                const t = this.processor.handleTextExpression(this.options);
                                t.insertAfterNode(r), this._parts.push(t)
                            } else this._parts.push(...this.processor.handleAttributeExpressions(r, t.name, t.strings, this.options));
                            s++
                        } else n++, "TEMPLATE" === r.nodeName && o(r.content), r = i.nextNode();
                    else this._parts.push(void 0), s++
                }
            };
            return o(t), i && (document.adoptNode(t), customElements.upgrade(t)), t
        }
    }
    class g {
        constructor(t, e, s, n) {
            this.strings = t, this.values = e, this.type = s, this.processor = n
        }
        getHTML() {
            const t = this.strings.length - 1;
            let e = "",
                s = !0;
            for (let n = 0; n < t; n++) {
                const t = this.strings[n];
                e += t;
                const i = t.lastIndexOf(">");
                !(s = (i > -1 || s) && -1 === t.indexOf("<", i + 1)) && h && (e = e.replace(m, (t, e, s, n) => "style" === s ? `${e}style$${n}` : t)), e += s ? c : a
            }
            return e += this.strings[t]
        }
        getTemplateElement() {
            const t = document.createElement("template");
            return t.innerHTML = this.getHTML(), t
        }
    }
    const v = t => null === t || !("object" == typeof t || "function" == typeof t);
    class y {
        constructor(t, e, s) {
            this.dirty = !0, this.element = t, this.name = e, this.strings = s, this.parts = [];
            for (let t = 0; t < s.length - 1; t++) this.parts[t] = this._createPart()
        }
        _createPart() {
            return new _(this)
        }
        _getValue() {
            const t = this.strings,
                e = t.length - 1;
            let s = "";
            for (let n = 0; n < e; n++) {
                s += t[n];
                const e = this.parts[n];
                if (void 0 !== e) {
                    const t = e.value;
                    if (null != t && (Array.isArray(t) || "string" != typeof t && t[Symbol.iterator]))
                        for (const e of t) s += "string" == typeof e ? e : String(e);
                    else s += "string" == typeof t ? t : String(t)
                }
            }
            return s += t[e]
        }
        commit() {
            this.dirty && (this.dirty = !1, this.element.setAttribute(this.name, this._getValue()))
        }
    }
    class _ {
        constructor(t) {
            this.value = void 0, this.committer = t
        }
        setValue(t) {
            t === r || v(t) && t === this.value || (this.value = t, n(t) || (this.committer.dirty = !0))
        }
        commit() {
            for (; n(this.value);) {
                const t = this.value;
                this.value = r, t(this)
            }
            this.value !== r && this.committer.commit()
        }
    }
    class b {
        constructor(t) {
            this.value = void 0, this._pendingValue = void 0, this.options = t
        }
        appendInto(t) {
            this.startNode = t.appendChild(p()), this.endNode = t.appendChild(p())
        }
        insertAfterNode(t) {
            this.startNode = t, this.endNode = t.nextSibling
        }
        appendIntoPart(t) {
            t._insert(this.startNode = p()), t._insert(this.endNode = p())
        }
        insertAfterPart(t) {
            t._insert(this.startNode = p()), this.endNode = t.endNode, t.endNode = this.startNode
        }
        setValue(t) {
            this._pendingValue = t
        }
        commit() {
            for (; n(this._pendingValue);) {
                const t = this._pendingValue;
                this._pendingValue = r, t(this)
            }
            const t = this._pendingValue;
            t !== r && (v(t) ? t !== this.value && this._commitText(t) : t instanceof g ? this._commitTemplateResult(t) : t instanceof Node ? this._commitNode(t) : Array.isArray(t) || t[Symbol.iterator] ? this._commitIterable(t) : void 0 !== t.then ? this._commitPromise(t) : this._commitText(t))
        }
        _insert(t) {
            this.endNode.parentNode.insertBefore(t, this.endNode)
        }
        _commitNode(t) {
            this.value !== t && (this.clear(), this._insert(t), this.value = t)
        }
        _commitText(t) {
            const e = this.startNode.nextSibling;
            t = null == t ? "" : t, e === this.endNode.previousSibling && e.nodeType === Node.TEXT_NODE ? e.textContent = t : this._commitNode(document.createTextNode("string" == typeof t ? t : String(t))), this.value = t
        }
        _commitTemplateResult(t) {
            const e = this.options.templateFactory(t);
            if (this.value && this.value.template === e) this.value.update(t.values);
            else {
                const s = new f(e, t.processor, this.options),
                    n = s._clone();
                s.update(t.values), this._commitNode(n), this.value = s
            }
        }
        _commitIterable(t) {
            Array.isArray(this.value) || (this.value = [], this.clear());
            const e = this.value;
            let s, n = 0;
            for (const i of t) void 0 === (s = e[n]) && (s = new b(this.options), e.push(s), 0 === n ? s.appendIntoPart(this) : s.insertAfterPart(e[n - 1])), s.setValue(i), s.commit(), n++;
            n < e.length && (e.length = n, this.clear(s && s.endNode))
        }
        _commitPromise(t) {
            this.value = t, t.then(e => {
                this.value === t && (this.setValue(e), this.commit())
            })
        }
        clear(t = this.startNode) {
            o(this.startNode.parentNode, t.nextSibling, this.endNode)
        }
    }
    class w {
        constructor(t, e, s) {
            if (this.value = void 0, this._pendingValue = void 0, 2 !== s.length || "" !== s[0] || "" !== s[1]) throw new Error("Boolean attributes can only contain a single expression");
            this.element = t, this.name = e, this.strings = s
        }
        setValue(t) {
            this._pendingValue = t
        }
        commit() {
            for (; n(this._pendingValue);) {
                const t = this._pendingValue;
                this._pendingValue = r, t(this)
            }
            if (this._pendingValue === r) return;
            const t = !!this._pendingValue;
            this.value !== t && (t ? this.element.setAttribute(this.name, "") : this.element.removeAttribute(this.name)), this.value = t, this._pendingValue = r
        }
    }
    class N extends y {
        constructor(t, e, s) {
            super(t, e, s), this.single = 2 === s.length && "" === s[0] && "" === s[1]
        }
        _createPart() {
            return new x(this)
        }
        _getValue() {
            return this.single ? this.parts[0].value : super._getValue()
        }
        commit() {
            this.dirty && (this.dirty = !1, this.element[this.name] = this._getValue())
        }
    }
    class x extends _ {}
    let P = !1;
    try {
        const t = {
            get capture() {
                return P = !0, !1
            }
        };
        window.addEventListener("test", t, t), window.removeEventListener("test", t, t)
    } catch (t) {}
    class S {
        constructor(t, e, s) {
            this.value = void 0, this._pendingValue = void 0, this.element = t, this.eventName = e, this.eventContext = s, this._boundHandleEvent = (t => this.handleEvent(t))
        }
        setValue(t) {
            this._pendingValue = t
        }
        commit() {
            for (; n(this._pendingValue);) {
                const t = this._pendingValue;
                this._pendingValue = r, t(this)
            }
            if (this._pendingValue === r) return;
            const t = this._pendingValue,
                e = this.value,
                s = null == t || null != e && (t.capture !== e.capture || t.once !== e.once || t.passive !== e.passive),
                i = null != t && (null == e || s);
            s && this.element.removeEventListener(this.eventName, this._boundHandleEvent, this._options), this._options = E(t), i && this.element.addEventListener(this.eventName, this._boundHandleEvent, this._options), this.value = t, this._pendingValue = r
        }
        handleEvent(t) {
            "function" == typeof this.value ? this.value.call(this.eventContext || this.element, t) : this.value.handleEvent(t)
        }
    }
    const E = t => t && (P ? {
        capture: t.capture,
        passive: t.passive,
        once: t.once
    } : t.capture);
    const T = new class {
        handleAttributeExpressions(t, e, s, n) {
            const i = e[0];
            return "." === i ? new N(t, e.slice(1), s).parts : "@" === i ? [new S(t, e.slice(1), n.eventContext)] : "?" === i ? [new w(t, e.slice(1), s)] : new y(t, e, s).parts
        }
        handleTextExpression(t) {
            return new b(t)
        }
    };

    function C(t) {
        let e = A.get(t.type);
        void 0 === e && (e = new Map, A.set(t.type, e));
        let s = e.get(t.strings);
        return void 0 === s && (s = new d(t, t.getTemplateElement()), e.set(t.strings, s)), s
    }
    const A = new Map,
        V = new WeakMap,
        M = (t, ...e) => new g(t, e, "html", T),
        O = NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT;

    function $(t, e) {
        const {
            element: {
                content: s
            },
            parts: n
        } = t, i = document.createTreeWalker(s, O, null, !1);
        let o = F(n),
            r = n[o],
            a = -1,
            c = 0;
        const l = [];
        let h = null;
        for (; i.nextNode();) {
            a++;
            const t = i.currentNode;
            for (t.previousSibling === h && (h = null), e.has(t) && (l.push(t), null === h && (h = t)), null !== h && c++; void 0 !== r && r.index === a;) r.index = null !== h ? -1 : r.index - c, r = n[o = F(n, o)]
        }
        l.forEach(t => t.parentNode.removeChild(t))
    }
    const k = t => {
            let e = t.nodeType === Node.DOCUMENT_FRAGMENT_NODE ? 0 : 1;
            const s = document.createTreeWalker(t, O, null, !1);
            for (; s.nextNode();) e++;
            return e
        },
        F = (t, e = -1) => {
            for (let s = e + 1; s < t.length; s++) {
                const e = t[s];
                if (u(e)) return s
            }
            return -1
        };
    const R = (t, e) => `${t}--${e}`;
    let L = !0;
    void 0 === window.ShadyCSS ? L = !1 : void 0 === window.ShadyCSS.prepareTemplateDom && (console.warn("Incompatible ShadyCSS version detected.Please update to at least @webcomponents/webcomponentsjs@2.0.2 and@webcomponents/shadycss@1.3.1."), L = !1);
    const j = ["html", "svg"],
        D = new Set,
        U = (t, e, s) => {
            D.add(s);
            const n = t.querySelectorAll("style");
            if (0 === n.length) return;
            const i = document.createElement("style");
            for (let t = 0; t < n.length; t++) {
                const e = n[t];
                e.parentNode.removeChild(e), i.textContent += e.textContent
            }
            if ((t => {
                    j.forEach(e => {
                        const s = A.get(R(e, t));
                        void 0 !== s && s.forEach(t => {
                            const {
                                element: {
                                    content: e
                                }
                            } = t, s = new Set;
                            Array.from(e.querySelectorAll("style")).forEach(t => {
                                s.add(t)
                            }), $(t, s)
                        })
                    })
                })(s), function(t, e, s = null) {
                    const {
                        element: {
                            content: n
                        },
                        parts: i
                    } = t;
                    if (null == s) return void n.appendChild(e);
                    const o = document.createTreeWalker(n, O, null, !1);
                    let r = F(i),
                        a = 0,
                        c = -1;
                    for (; o.nextNode();)
                        for (c++, o.currentNode === s && (a = k(e), s.parentNode.insertBefore(e, s)); - 1 !== r && i[r].index === c;) {
                            if (a > 0) {
                                for (; - 1 !== r;) i[r].index += a, r = F(i, r);
                                return
                            }
                            r = F(i, r)
                        }
                }(e, i, e.element.content.firstChild), window.ShadyCSS.prepareTemplateStyles(e.element, s), window.ShadyCSS.nativeShadow) {
                const s = e.element.content.querySelector("style");
                t.insertBefore(s.cloneNode(!0), t.firstChild)
            } else {
                e.element.content.insertBefore(i, e.element.content.firstChild);
                const t = new Set;
                t.add(i), $(e, t)
            }
        },
        z = t => null !== t,
        B = t => t ? "" : null,
        W = (t, e) => e !== t && (e == e || t == t),
        q = {
            attribute: !0,
            type: String,
            reflect: !1,
            hasChanged: W
        },
        H = new Promise(t => t(!0)),
        I = 1,
        G = 4,
        X = 8;
    class Y extends HTMLElement {
        constructor() {
            super(), this._updateState = 0, this._instanceProperties = void 0, this._updatePromise = H, this._changedProperties = new Map, this._reflectingProperties = void 0, this.initialize()
        }
        static get observedAttributes() {
            this._finalize();
            const t = [];
            for (const [e, s] of this._classProperties) {
                const n = this._attributeNameForProperty(e, s);
                void 0 !== n && (this._attributeToPropertyMap.set(n, e), t.push(n))
            }
            return t
        }
        static createProperty(t, e = q) {
            if (!this.hasOwnProperty("_classProperties")) {
                this._classProperties = new Map;
                const t = Object.getPrototypeOf(this)._classProperties;
                void 0 !== t && t.forEach((t, e) => this._classProperties.set(e, t))
            }
            if (this._classProperties.set(t, e), this.prototype.hasOwnProperty(t)) return;
            const s = "symbol" == typeof t ? Symbol() : `__${t}`;
            Object.defineProperty(this.prototype, t, {
                get() {
                    return this[s]
                },
                set(n) {
                    const i = this[t];
                    this[s] = n, this._requestPropertyUpdate(t, i, e)
                },
                configurable: !0,
                enumerable: !0
            })
        }
        static _finalize() {
            if (this.hasOwnProperty("_finalized") && this._finalized) return;
            const t = Object.getPrototypeOf(this);
            "function" == typeof t._finalize && t._finalize(), this._finalized = !0, this._attributeToPropertyMap = new Map;
            const e = this.properties,
                s = [...Object.getOwnPropertyNames(e), ..."function" == typeof Object.getOwnPropertySymbols ? Object.getOwnPropertySymbols(e) : []];
            for (const t of s) this.createProperty(t, e[t])
        }
        static _attributeNameForProperty(t, e) {
            const s = void 0 !== e && e.attribute;
            return !1 === s ? void 0 : "string" == typeof s ? s : "string" == typeof t ? t.toLowerCase() : void 0
        }
        static _valueHasChanged(t, e, s = W) {
            return s(t, e)
        }
        static _propertyValueFromAttribute(t, e) {
            const s = e && e.type;
            if (void 0 === s) return t;
            const n = s === Boolean ? z : "function" == typeof s ? s : s.fromAttribute;
            return n ? n(t) : t
        }
        static _propertyValueToAttribute(t, e) {
            if (void 0 === e || void 0 === e.reflect) return;
            return (e.type === Boolean ? B : e.type && e.type.toAttribute || String)(t)
        }
        initialize() {
            this.renderRoot = this.createRenderRoot(), this._saveInstanceProperties()
        }
        _saveInstanceProperties() {
            for (const [t] of this.constructor._classProperties)
                if (this.hasOwnProperty(t)) {
                    const e = this[t];
                    delete this[t], this._instanceProperties || (this._instanceProperties = new Map), this._instanceProperties.set(t, e)
                }
        }
        _applyInstanceProperties() {
            for (const [t, e] of this._instanceProperties) this[t] = e;
            this._instanceProperties = void 0
        }
        createRenderRoot() {
            return this.attachShadow({
                mode: "open"
            })
        }
        connectedCallback() {
            this._updateState & I ? void 0 !== window.ShadyCSS && window.ShadyCSS.styleElement(this) : this.requestUpdate()
        }
        disconnectedCallback() {}
        attributeChangedCallback(t, e, s) {
            e !== s && this._attributeToProperty(t, s)
        }
        _propertyToAttribute(t, e, s = q) {
            const n = this.constructor,
                i = n._propertyValueToAttribute(e, s);
            if (void 0 !== i) {
                const e = n._attributeNameForProperty(t, s);
                void 0 !== e && (this._updateState = this._updateState | X, null === i ? this.removeAttribute(e) : this.setAttribute(e, i), this._updateState = this._updateState & ~X)
            }
        }
        _attributeToProperty(t, e) {
            if (!(this._updateState & X)) {
                const s = this.constructor,
                    n = s._attributeToPropertyMap.get(t);
                if (void 0 !== n) {
                    const t = s._classProperties.get(n);
                    this[n] = s._propertyValueFromAttribute(e, t)
                }
            }
        }
        requestUpdate(t, e) {
            if (void 0 !== t) {
                const s = this.constructor._classProperties.get(t) || q;
                return this._requestPropertyUpdate(t, e, s)
            }
            return this._invalidate()
        }
        _requestPropertyUpdate(t, e, s) {
            return this.constructor._valueHasChanged(this[t], e, s.hasChanged) ? (this._changedProperties.has(t) || this._changedProperties.set(t, e), !0 === s.reflect && (void 0 === this._reflectingProperties && (this._reflectingProperties = new Map), this._reflectingProperties.set(t, s)), this._invalidate()) : this.updateComplete
        }
        async _invalidate() {
            if (!this._hasRequestedUpdate) {
                let t;
                this._updateState = this._updateState | G;
                const e = this._updatePromise;
                this._updatePromise = new Promise(e => t = e), await e, this._validate(), t(!this._hasRequestedUpdate)
            }
            return this.updateComplete
        }
        get _hasRequestedUpdate() {
            return this._updateState & G
        }
        _validate() {
            if (this._instanceProperties && this._applyInstanceProperties(), this.shouldUpdate(this._changedProperties)) {
                const t = this._changedProperties;
                this.update(t), this._markUpdated(), this._updateState & I || (this._updateState = this._updateState | I, this.firstUpdated(t)), this.updated(t)
            } else this._markUpdated()
        }
        _markUpdated() {
            this._changedProperties = new Map, this._updateState = this._updateState & ~G
        }
        get updateComplete() {
            return this._updatePromise
        }
        shouldUpdate(t) {
            return !0
        }
        update(t) {
            if (void 0 !== this._reflectingProperties && this._reflectingProperties.size > 0) {
                for (const [t, e] of this._reflectingProperties) this._propertyToAttribute(t, this[t], e);
                this._reflectingProperties = void 0
            }
        }
        updated(t) {}
        firstUpdated(t) {}
    }
    Y._attributeToPropertyMap = new Map, Y._finalized = !0, Y._classProperties = new Map, Y.properties = {};
    const Z = t => (e, s) => {
        e.constructor.createProperty(s, t)
    };
    class J extends Y {
        update(t) {
            super.update(t);
            const e = this.render();
            e instanceof g && this.constructor.render(e, this.renderRoot, {
                scopeName: this.localName,
                eventContext: this
            })
        }
        render() {}
    }
    J.render = ((t, e, s) => {
        const n = s.scopeName,
            i = V.has(e);
        if (((t, e, s) => {
                let n = V.get(e);
                void 0 === n && (o(e, e.firstChild), V.set(e, n = new b(Object.assign({
                    templateFactory: C
                }, s))), n.appendInto(e)), n.setValue(t), n.commit()
            })(t, e, Object.assign({
                templateFactory: (t => e => {
                    const s = R(e.type, t);
                    let n = A.get(s);
                    void 0 === n && (n = new Map, A.set(s, n));
                    let i = n.get(e.strings);
                    if (void 0 === i) {
                        const s = e.getTemplateElement();
                        L && window.ShadyCSS.prepareTemplateDom(s, t), i = new d(e, s), n.set(e.strings, i)
                    }
                    return i
                })(n)
            }, s)), e instanceof ShadowRoot && L && t instanceof g) {
            if (!D.has(n)) {
                const t = V.get(e).value;
                U(e, t.template, n)
            }
            i || window.ShadyCSS.styleElement(e.host)
        }
    });
    const K = window;
    if (!K.AudioContext && K.webkitAudioContext) {
        const t = webkitAudioContext.prototype.decodeAudioData;
        webkitAudioContext.prototype.decodeAudioData = function(e) {
            return new Promise((s, n) => {
                t.call(this, e, s, n)
            })
        }
    }
    const Q = "https://zampona.org/audio/zampona-sounds.mp3",
        tt = [{
            pitch: 62,
            in: 53725,
            out: 105200
        }, {
            pitch: 64,
            in: 47864,
            out: 93723
        }, {
            pitch: 66,
            in: 54899,
            out: 107200
        }, {
            pitch: 67,
            in: 51818,
            out: 101183
        }, {
            pitch: 69,
            in: 46479,
            out: 99200
        }, {
            pitch: 71,
            in: 43464,
            out: 121332
        }, {
            pitch: 72,
            in: 41024,
            out: 114522
        }, {
            pitch: 74,
            in: 54177,
            out: 112787
        }, {
            pitch: 76,
            in: 48266,
            out: 100482
        }, {
            pitch: 78,
            in: 58281,
            out: 113814
        }, {
            pitch: 79,
            in: 55010,
            out: 107426
        }, {
            pitch: 81,
            in: 52736,
            out: 112642
        }, {
            pitch: 83,
            in: 46983,
            out: 100353
        }];
    class et {
        constructor(t, e, s) {
            this.pitch = t, this.context = e, this.sourceNode = this.context.createBufferSource(), this.gainNode = this.context.createGain();
            let n = 0,
                i = tt[n];
            for (; i.pitch < t && n < tt.length - 1;) i = tt[++n];
            this.startPoint = 4 * n, this.sourceNode.buffer = s, this.sourceNode.loopStart = this.startPoint + i.in / 44100, this.sourceNode.loopEnd = this.startPoint + i.out / 44100, this.sourceNode.loop = !0, t != i.pitch && (this.sourceNode.detune.value = 100 * (t - i.pitch)), this.sourceNode.connect(this.gainNode), this.gainNode.connect(e.destination)
        }
        play() {
            this.sourceNode.start(0, this.startPoint)
        }
        stop() {
            const t = this.context.currentTime + .1;
            this.gainNode.gain.exponentialRampToValueAtTime(1e-5, t), this.sourceNode.stop(t)
        }
    }
    class st {
        constructor(t = Q) {
            this.audioFile = t, this.context = new(window.AudioContext || window.webkitAudioContext), this.soundPromise = this.loadSound(), this.notes = new Map, this.loaded = this.soundPromise.then(() => void 0)
        }
        loadSound() {
            return e(this, void 0, void 0, function*() {
                const t = yield window.fetch(this.audioFile), e = yield t.arrayBuffer();
                return yield this.context.decodeAudioData(e)
            })
        }
        playNote(t, s = 1) {
            return e(this, void 0, void 0, function*() {
                const e = yield this.soundPromise;
                if (!this.notes.has(t)) {
                    const s = new et(t, this.context, e);
                    return this.notes.set(t, s), s.play(), s
                }
            })
        }
        stopNote(t) {
            return e(this, void 0, void 0, function*() {
                const e = this.notes.get(t);
                e && (e.stop(), this.notes.delete(t))
            })
        }
    }
    const nt = [{
        center: [31.451, 126.801],
        labelPos: [67.357, 129.758],
        name: "G5",
        pitch: 79,
        rect: [2.77, 96.913, 60.651, 60.505]
    }, {
        center: [91.559, 331.83],
        labelPos: [131.799, 323.082],
        name: "G4",
        pitch: 67,
        rect: [64.463, 303.267, 77.298, 56.165]
    }, {
        center: [34.075, 360.365],
        labelPos: [67.999, 355.49],
        name: "F#4",
        pitch: 66,
        rect: [2, 330.664, 62.4, 56.277]
    }, {
        center: [91.956, 157.563],
        labelPos: [132.965, 160.375],
        name: "F#5",
        pitch: 78,
        rect: [63.588, 127.93, 77.881, 59.565]
    }, {
        center: [91.997, 274.387],
        labelPos: [130.049, 266.514],
        name: "B4",
        pitch: 71,
        rect: [63.673, 245.862, 77.298, 57.865]
    }, {
        center: [31.159, 66.15],
        labelPos: [66.483, 70.565],
        name: "B5",
        pitch: 83,
        rect: [2.624, 19.35, 60.942, 77.709]
    }, {
        center: [91.81, 97.058],
        labelPos: [131.216, 100.89],
        name: "A5",
        pitch: 81,
        rect: [63.573, 53.889, 78.244, 74.21]
    }, {
        center: [32.909, 302.776],
        labelPos: [67.332, 301.938],
        name: "A4",
        pitch: 69,
        rect: [2, 274.095, 62.984, 56.714]
    }, {
        center: [32.325, 186.577],
        labelPos: [67.066, 187.201],
        name: "E5",
        pitch: 76,
        rect: [3.062, 156.98, 62.984, 59.193]
    }, {
        center: [90.976, 388.69],
        labelPos: [132.382, 377.901],
        name: "E4",
        pitch: 64,
        rect: [63.211, 358.56, 78.173, 73.485]
    }, {
        center: [34.367, 417.516],
        labelPos: [69.982, 408.81],
        name: "D4",
        pitch: 62,
        rect: [1.75, 386.94, 61.817, 66.774]
    }, {
        center: [92.393, 216.36],
        labelPos: [132.965, 216.36],
        name: "D5",
        pitch: 74,
        rect: [65.921, 187.497, 75.257, 58.448]
    }, {
        center: [32.617, 245.624],
        labelPos: [67.941, 245.56],
        name: "C5",
        pitch: 72,
        rect: [2.583, 215.882, 63.567, 58.318]
    }];
    class it extends J {
        constructor() {
            super(...arguments), this.soundEngine = new st, this.activeNotes = new Set, this.labels = !0
        }
        playNote(t) {
            this.activeNotes.add(t), this.soundEngine.playNote(t.pitch), this.update(new Map)
        }
        stopNote(t) {
            this.activeNotes.delete(t), this.soundEngine.stopNote(t.pitch), this.update(new Map)
        }
        get instrumentElement() {
            return this.shadowRoot.querySelector(".instrument")
        }
        touchevent(t) {
            const e = new Set(this.activeNotes);
            for (let s = 0; s < t.touches.length; s++) {
                const n = t.touches[s];
                if (n.target) {
                    const t = n.pageX - this.instrumentElement.offsetLeft,
                        s = n.pageY - this.instrumentElement.offsetTop;
                    for (const n of nt) {
                        const [i, o, r, a] = n.rect;
                        o < t && o + a > t && i < s && i + r > s && (this.playNote(n), e.delete(n))
                    }
                }
            }
            for (const t of e) this.stopNote(t)
        }
        touchend() {
            for (const t of this.activeNotes) this.stopNote(t)
        }
        renderNote(t) {
            const [e, s, n, i] = t.rect, o = `\n      left: ${s}px;\n      top: ${e}px;\n      width: ${i}px;\n      height: ${n}px;\n    `, [r, a] = t.center, c = `\n      top: ${r}px;\n      left: ${a}px;\n    `, [l, h] = t.labelPos, d = `\n      top: ${l}px;\n      left: ${h}px;\n    `, u = this.activeNotes.has(t);
            return M `
      <div class="note-highlight ${u&&"active"}" style="${c}"></div>
      <label class="note-label" style="${d}" ?hidden="${!this.labels}">${t.name}</label>
      <button
        @mousedown="${e=>0===e.button&&this.playNote(t)}"
        @mouseup="${e=>0===e.button&&this.stopNote(t)}"
        @mouseenter="${e=>{1&e.buttons&&this.playNote(t)}}"
        @mouseleave="${()=>this.stopNote(t)}"
        class="note-button"
        style="${o}"
      ></button>
    `
        }
        render() {
            return M `
      <style>
        :host {
          display: block;
          --highlight-radius: 30px;
        }

        [hidden] {
          display: none;
        }

        .instrument {
          position: relative;
          width: 480px;
          height: 320px;
          background: url(zampona-full.png);
          margin: 0 auto;
        }

        .note-button {
          position: absolute;
          background: transparent;
          border: none;
          outline: none;
        }

        .note-label {
          position: absolute;
          color: white;
          margin: -10px 0 0 -50px;
          width: 100px;
          text-align: center;
          pointer-events: none;
        }

        .note-highlight {
          position: absolute;
          height: calc(var(--highlight-radius) * 2);
          width: calc(var(--highlight-radius) * 2);
          border-radius: var(--highlight-radius);
          margin: calc(-1 * var(--highlight-radius)) 0 0 calc(-1 * var(--highlight-radius));
        }

        .note-highlight.active {
          background: radial-gradient(
            circle at center,
            rgba(31, 166, 255, 1) 0,
            rgba(31, 176, 251, 0) 60%
          );
        }
      </style>
      <div
        class="instrument"
        @touchstart="${t=>this.touchevent(t)}"
        @touchmove="${t=>this.touchevent(t)}"
        @touchend="${t=>this.touchend()}"
      >
        ${nt.map(t=>this.renderNote(t))}
      </div>
    `
        }
    }
    t([Z()], it.prototype, "activeNotes", void 0), t([Z()], it.prototype, "labels", void 0), customElements.define("zampona-element", it)
}();
//# sourceMappingURL=zampona-element.min.js.map