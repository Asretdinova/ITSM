function _classCallCheck(e, t) {
  if (!(e instanceof t))
    throw new TypeError("Cannot call a class as a function");
}
var JSON;
!(function (e, t) {
  "use strict";
  "function" == typeof define && define.amd
    ? define(t)
    : "object" == typeof exports
    ? (module.exports = t())
    : (e.returnExports = t());
})(this, function () {
  var p,
    h,
    u = Array,
    e = u.prototype,
    c = Object,
    t = c.prototype,
    l = Function,
    n = l.prototype,
    w = String,
    r = w.prototype,
    x = Number,
    o = x.prototype,
    f = e.slice,
    i = e.splice,
    d = e.push,
    a = e.unshift,
    g = e.concat,
    y = e.join,
    s = n.call,
    v = n.apply,
    m = Math.max,
    b = Math.min,
    A = t.toString,
    S = "function" == typeof Symbol && "symbol" == typeof Symbol.toStringTag,
    T = Function.prototype.toString,
    C = /^\s*class /,
    O = function O(e) {
      try {
        var t = T.call(e)
          .replace(/\/\/.*\n/g, "")
          .replace(/\/\*[.\s\S]*\*\//g, "")
          .replace(/\n/gm, " ")
          .replace(/ {2}/g, " ");
        return C.test(t);
      } catch (n) {
        return !1;
      }
    },
    j = function j(e) {
      try {
        return !O(e) && (T.call(e), !0);
      } catch (t) {
        return !1;
      }
    },
    E = "[object Function]",
    I = "[object GeneratorFunction]",
    N = function N(e) {
      if (!e) return !1;
      if ("function" != typeof e && "object" != typeof e) return !1;
      if (S) return j(e);
      if (O(e)) return !1;
      var t = A.call(e);
      return t === E || t === I;
    },
    P = RegExp.prototype.exec,
    k = function k(e) {
      try {
        return P.call(e), !0;
      } catch (t) {
        return !1;
      }
    },
    D = "[object RegExp]";
  p = function p(e) {
    return "object" == typeof e && (S ? k(e) : A.call(e) === D);
  };
  var M = String.prototype.valueOf,
    L = function L(e) {
      try {
        return M.call(e), !0;
      } catch (t) {
        return !1;
      }
    },
    R = "[object String]";
  h = function h(e) {
    return (
      "string" == typeof e ||
      ("object" == typeof e && (S ? L(e) : A.call(e) === R))
    );
  };
  var _,
    F,
    q =
      c.defineProperty &&
      (function () {
        try {
          var e = {};
          for (var t in (c.defineProperty(e, "x", { enumerable: !1, value: e }),
          e))
            return !1;
          return e.x === e;
        } catch (n) {
          return !1;
        }
      })(),
    B =
      ((_ = t.hasOwnProperty),
      (F = q
        ? function (e, t, n, r) {
            (!r && t in e) ||
              c.defineProperty(e, t, {
                configurable: !0,
                enumerable: !1,
                writable: !0,
                value: n,
              });
          }
        : function (e, t, n, r) {
            (!r && t in e) || (e[t] = n);
          }),
      function zt(e, t, n) {
        for (var r in t) _.call(t, r) && F(e, r, t[r], n);
      }),
    W = function W(e) {
      var t = typeof e;
      return null === e || ("object" !== t && "function" !== t);
    },
    H =
      x.isNaN ||
      function H(e) {
        return e != e;
      },
    U = {
      ToInteger: function Yt(e) {
        var t = +e;
        return (
          H(t)
            ? (t = 0)
            : 0 !== t &&
              t !== 1 / 0 &&
              t !== -1 / 0 &&
              (t = (0 < t || -1) * Math.floor(Math.abs(t))),
          t
        );
      },
      ToPrimitive: function Vt(e) {
        var t, n, r;
        if (W(e)) return e;
        if (((n = e.valueOf), N(n) && ((t = n.call(e)), W(t)))) return t;
        if (((r = e.toString), N(r) && ((t = r.call(e)), W(t)))) return t;
        throw new TypeError();
      },
      ToObject: function (e) {
        if (null == e) throw new TypeError("can't convert " + e + " to object");
        return c(e);
      },
      ToUint32: function Xt(e) {
        return e >>> 0;
      },
    },
    J = function J() {};
  B(n, {
    bind: function Zt(t) {
      var n = this;
      if (!N(n))
        throw new TypeError(
          "Function.prototype.bind called on incompatible " + n
        );
      for (
        var r,
          o = f.call(arguments, 1),
          e = function () {
            if (this instanceof r) {
              var e = v.call(n, this, g.call(o, f.call(arguments)));
              return c(e) === e ? e : this;
            }
            return v.call(n, t, g.call(o, f.call(arguments)));
          },
          i = m(0, n.length - o.length),
          a = [],
          s = 0;
        s < i;
        s++
      )
        d.call(a, "$" + s);
      return (
        (r = l(
          "binder",
          "return function (" +
            y.call(a, ",") +
            "){ return binder.apply(this, arguments); }"
        )(e)),
        n.prototype &&
          ((J.prototype = n.prototype),
          (r.prototype = new J()),
          (J.prototype = null)),
        r
      );
    },
  });
  var G = s.bind(t.hasOwnProperty),
    z = s.bind(t.toString),
    Y = s.bind(f),
    V = v.bind(f),
    X = s.bind(r.slice),
    Z = s.bind(r.split),
    Q = s.bind(r.indexOf),
    K = s.bind(d),
    $ = s.bind(t.propertyIsEnumerable),
    ee = s.bind(e.sort),
    te =
      u.isArray ||
      function te(e) {
        return "[object Array]" === z(e);
      },
    ne = 1 !== [].unshift(0);
  B(
    e,
    {
      unshift: function () {
        return a.apply(this, arguments), this.length;
      },
    },
    ne
  ),
    B(u, { isArray: te });
  var re = c("a"),
    oe = "a" !== re[0] || !(0 in re),
    ie = function Qt(e) {
      var r = !0,
        t = !0,
        n = !1;
      if (e)
        try {
          e.call("foo", function (e, t, n) {
            "object" != typeof n && (r = !1);
          }),
            e.call(
              [1],
              function () {
                "use strict";
                t = "string" == typeof this;
              },
              "x"
            );
        } catch (o) {
          n = !0;
        }
      return !!e && !n && r && t;
    };
  B(
    e,
    {
      forEach: function Kt(e, t) {
        var n,
          r = U.ToObject(this),
          o = oe && h(this) ? Z(this, "") : r,
          i = -1,
          a = U.ToUint32(o.length);
        if ((1 < arguments.length && (n = t), !N(e)))
          throw new TypeError(
            "Array.prototype.forEach callback must be a function"
          );
        for (; ++i < a; )
          i in o && (void 0 === n ? e(o[i], i, r) : e.call(n, o[i], i, r));
      },
    },
    !ie(e.forEach)
  ),
    B(
      e,
      {
        map: function $t(e, t) {
          var n,
            r = U.ToObject(this),
            o = oe && h(this) ? Z(this, "") : r,
            i = U.ToUint32(o.length),
            a = u(i);
          if ((1 < arguments.length && (n = t), !N(e)))
            throw new TypeError(
              "Array.prototype.map callback must be a function"
            );
          for (var s = 0; s < i; s++)
            s in o &&
              (a[s] = void 0 === n ? e(o[s], s, r) : e.call(n, o[s], s, r));
          return a;
        },
      },
      !ie(e.map)
    ),
    B(
      e,
      {
        filter: function en(e, t) {
          var n,
            r,
            o = U.ToObject(this),
            i = oe && h(this) ? Z(this, "") : o,
            a = U.ToUint32(i.length),
            s = [];
          if ((1 < arguments.length && (r = t), !N(e)))
            throw new TypeError(
              "Array.prototype.filter callback must be a function"
            );
          for (var u = 0; u < a; u++)
            u in i &&
              ((n = i[u]),
              (void 0 === r ? e(n, u, o) : e.call(r, n, u, o)) && K(s, n));
          return s;
        },
      },
      !ie(e.filter)
    ),
    B(
      e,
      {
        every: function tn(e, t) {
          var n,
            r = U.ToObject(this),
            o = oe && h(this) ? Z(this, "") : r,
            i = U.ToUint32(o.length);
          if ((1 < arguments.length && (n = t), !N(e)))
            throw new TypeError(
              "Array.prototype.every callback must be a function"
            );
          for (var a = 0; a < i; a++)
            if (
              a in o &&
              !(void 0 === n ? e(o[a], a, r) : e.call(n, o[a], a, r))
            )
              return !1;
          return !0;
        },
      },
      !ie(e.every)
    ),
    B(
      e,
      {
        some: function nn(e, t) {
          var n,
            r = U.ToObject(this),
            o = oe && h(this) ? Z(this, "") : r,
            i = U.ToUint32(o.length);
          if ((1 < arguments.length && (n = t), !N(e)))
            throw new TypeError(
              "Array.prototype.some callback must be a function"
            );
          for (var a = 0; a < i; a++)
            if (
              a in o &&
              (void 0 === n ? e(o[a], a, r) : e.call(n, o[a], a, r))
            )
              return !0;
          return !1;
        },
      },
      !ie(e.some)
    );
  var ae = !1;
  e.reduce &&
    (ae =
      "object" ==
      typeof e.reduce.call("es5", function (e, t, n, r) {
        return r;
      })),
    B(
      e,
      {
        reduce: function rn(e, t) {
          var n = U.ToObject(this),
            r = oe && h(this) ? Z(this, "") : n,
            o = U.ToUint32(r.length);
          if (!N(e))
            throw new TypeError(
              "Array.prototype.reduce callback must be a function"
            );
          if (0 === o && 1 === arguments.length)
            throw new TypeError("reduce of empty array with no initial value");
          var i,
            a = 0;
          if (2 <= arguments.length) i = t;
          else
            for (;;) {
              if (a in r) {
                i = r[a++];
                break;
              }
              if (++a >= o)
                throw new TypeError(
                  "reduce of empty array with no initial value"
                );
            }
          for (; a < o; a++) a in r && (i = e(i, r[a], a, n));
          return i;
        },
      },
      !ae
    );
  var se = !1;
  e.reduceRight &&
    (se =
      "object" ==
      typeof e.reduceRight.call("es5", function (e, t, n, r) {
        return r;
      })),
    B(
      e,
      {
        reduceRight: function on(e, t) {
          var n,
            r = U.ToObject(this),
            o = oe && h(this) ? Z(this, "") : r,
            i = U.ToUint32(o.length);
          if (!N(e))
            throw new TypeError(
              "Array.prototype.reduceRight callback must be a function"
            );
          if (0 === i && 1 === arguments.length)
            throw new TypeError(
              "reduceRight of empty array with no initial value"
            );
          var a = i - 1;
          if (2 <= arguments.length) n = t;
          else
            for (;;) {
              if (a in o) {
                n = o[a--];
                break;
              }
              if (--a < 0)
                throw new TypeError(
                  "reduceRight of empty array with no initial value"
                );
            }
          if (a < 0) return n;
          for (; a in o && (n = e(n, o[a], a, r)), a--; );
          return n;
        },
      },
      !se
    );
  var ue = e.indexOf && -1 !== [0, 1].indexOf(1, 2);
  B(
    e,
    {
      indexOf: function an(e, t) {
        var n = oe && h(this) ? Z(this, "") : U.ToObject(this),
          r = U.ToUint32(n.length);
        if (0 === r) return -1;
        var o = 0;
        for (
          1 < arguments.length && (o = U.ToInteger(t)),
            o = 0 <= o ? o : m(0, r + o);
          o < r;
          o++
        )
          if (o in n && n[o] === e) return o;
        return -1;
      },
    },
    ue
  );
  var ce = e.lastIndexOf && -1 !== [0, 1].lastIndexOf(0, -3);
  B(
    e,
    {
      lastIndexOf: function sn(e, t) {
        var n = oe && h(this) ? Z(this, "") : U.ToObject(this),
          r = U.ToUint32(n.length);
        if (0 === r) return -1;
        var o = r - 1;
        for (
          1 < arguments.length && (o = b(o, U.ToInteger(t))),
            o = 0 <= o ? o : r - Math.abs(o);
          0 <= o;
          o--
        )
          if (o in n && e === n[o]) return o;
        return -1;
      },
    },
    ce
  );
  var le,
    fe,
    pe =
      ((fe = (le = [1, 2]).splice()),
      2 === le.length && te(fe) && 0 === fe.length);
  B(
    e,
    {
      splice: function un(e, t) {
        return 0 === arguments.length ? [] : i.apply(this, arguments);
      },
    },
    !pe
  );
  var he,
    de = ((he = {}), e.splice.call(he, 0, 0, 1), 1 === he.length);
  B(
    e,
    {
      splice: function un(e, t) {
        if (0 === arguments.length) return [];
        var n = arguments;
        return (
          (this.length = m(U.ToInteger(this.length), 0)),
          0 < arguments.length &&
            "number" != typeof t &&
            ((n = Y(arguments)).length < 2
              ? K(n, this.length - e)
              : (n[1] = U.ToInteger(t))),
          i.apply(this, n)
        );
      },
    },
    !de
  );
  var ge,
    ye,
    ve,
    me = (((ge = new u(1e5))[8] = "x"), ge.splice(1, 1), 7 === ge.indexOf("x")),
    be =
      (((ve = [])[(ye = 256)] = "a"),
      ve.splice(ye + 1, 0, "b"),
      "a" === ve[ye]);
  B(
    e,
    {
      splice: function un(e, t) {
        for (
          var n,
            r = U.ToObject(this),
            o = [],
            i = U.ToUint32(r.length),
            a = U.ToInteger(e),
            s = a < 0 ? m(i + a, 0) : b(a, i),
            u = b(m(U.ToInteger(t), 0), i - s),
            c = 0;
          c < u;

        )
          (n = w(s + c)), G(r, n) && (o[c] = r[n]), (c += 1);
        var l,
          f = Y(arguments, 2),
          p = f.length;
        if (p < u) {
          c = s;
          for (var h = i - u; c < h; )
            (n = w(c + u)),
              (l = w(c + p)),
              G(r, n) ? (r[l] = r[n]) : delete r[l],
              (c += 1);
          for (var d = (c = i) - u + p; d < c; ) delete r[c - 1], (c -= 1);
        } else if (u < p)
          for (c = i - u; s < c; )
            (n = w(c + u - 1)),
              (l = w(c + p - 1)),
              G(r, n) ? (r[l] = r[n]) : delete r[l],
              (c -= 1);
        c = s;
        for (var g = 0; g < f.length; ++g) (r[c] = f[g]), (c += 1);
        return (r.length = i - u + p), o;
      },
    },
    !me || !be
  );
  var we,
    xe = e.join;
  try {
    we = "1,2,3" !== Array.prototype.join.call("123", ",");
  } catch (cn) {
    we = !0;
  }
  we &&
    B(
      e,
      {
        join: function ln(e) {
          var t = void 0 === e ? "," : e;
          return xe.call(h(this) ? Z(this, "") : this, t);
        },
      },
      we
    );
  var Ae = "1,2" !== [1, 2].join(undefined);
  Ae &&
    B(
      e,
      {
        join: function ln(e) {
          var t = void 0 === e ? "," : e;
          return xe.call(this, t);
        },
      },
      Ae
    );
  var Se,
    Te = function fn() {
      for (
        var e = U.ToObject(this), t = U.ToUint32(e.length), n = 0;
        n < arguments.length;

      )
        (e[t + n] = arguments[n]), (n += 1);
      return (e.length = t + n), t + n;
    },
    Ce =
      ((Se = {}),
      1 !== Array.prototype.push.call(Se, undefined) ||
        1 !== Se.length ||
        "undefined" != typeof Se[0] ||
        !G(Se, 0));
  B(
    e,
    {
      push: function fn(e) {
        return te(this) ? d.apply(this, arguments) : Te.apply(this, arguments);
      },
    },
    Ce
  );
  var Oe,
    je =
      1 !== (Oe = []).push(undefined) ||
      1 !== Oe.length ||
      "undefined" != typeof Oe[0] ||
      !G(Oe, 0);
  B(e, { push: Te }, je),
    B(
      e,
      {
        slice: function (e, t) {
          var n = h(this) ? Z(this, "") : this;
          return V(n, arguments);
        },
      },
      oe
    );
  var Ee = (function () {
      try {
        return [1, 2].sort(null), [1, 2].sort({}), !0;
      } catch (cn) {}
      return !1;
    })(),
    Ie = (function () {
      try {
        return [1, 2].sort(/a/), !1;
      } catch (cn) {}
      return !0;
    })(),
    Ne = (function () {
      try {
        return [1, 2].sort(undefined), !0;
      } catch (cn) {}
      return !1;
    })();
  B(
    e,
    {
      sort: function pn(e) {
        if (void 0 === e) return ee(this);
        if (!N(e))
          throw new TypeError(
            "Array.prototype.sort callback must be a function"
          );
        return ee(this, e);
      },
    },
    Ee || !Ne || !Ie
  );
  var Pe = !$({ toString: null }, "toString"),
    ke = $(function () {}, "prototype"),
    De = !G("x", "0"),
    Me = function (e) {
      var t = e.constructor;
      return t && t.prototype === e;
    },
    Le = {
      $window: !0,
      $console: !0,
      $parent: !0,
      $self: !0,
      $frame: !0,
      $frames: !0,
      $frameElement: !0,
      $webkitIndexedDB: !0,
      $webkitStorageInfo: !0,
      $external: !0,
    },
    Re = (function () {
      if ("undefined" == typeof window) return !1;
      for (var e in window)
        try {
          !Le["$" + e] &&
            G(window, e) &&
            null !== window[e] &&
            "object" == typeof window[e] &&
            Me(window[e]);
        } catch (cn) {
          return !0;
        }
      return !1;
    })(),
    _e = function (e) {
      if ("undefined" == typeof window || !Re) return Me(e);
      try {
        return Me(e);
      } catch (cn) {
        return !1;
      }
    },
    Fe = [
      "toString",
      "toLocaleString",
      "valueOf",
      "hasOwnProperty",
      "isPrototypeOf",
      "propertyIsEnumerable",
      "constructor",
    ],
    qe = Fe.length,
    Be = function He(e) {
      return "[object Arguments]" === z(e);
    },
    We = function He(e) {
      return (
        null !== e &&
        "object" == typeof e &&
        "number" == typeof e.length &&
        0 <= e.length &&
        !te(e) &&
        N(e.callee)
      );
    },
    He = Be(arguments) ? Be : We;
  B(c, {
    keys: function hn(e) {
      var t = N(e),
        n = He(e),
        r = null !== e && "object" == typeof e,
        o = r && h(e);
      if (!r && !t && !n)
        throw new TypeError("Object.keys called on a non-object");
      var i = [],
        a = ke && t;
      if ((o && De) || n) for (var s = 0; s < e.length; ++s) K(i, w(s));
      if (!n)
        for (var u in e) (a && "prototype" === u) || !G(e, u) || K(i, w(u));
      if (Pe)
        for (var c = _e(e), l = 0; l < qe; l++) {
          var f = Fe[l];
          (c && "constructor" === f) || !G(e, f) || K(i, f);
        }
      return i;
    },
  });
  var Ue =
      c.keys &&
      (function () {
        return 2 === c.keys(arguments).length;
      })(1, 2),
    Je =
      c.keys &&
      (function () {
        var e = c.keys(arguments);
        return 1 !== arguments.length || 1 !== e.length || 1 !== e[0];
      })(1),
    Ge = c.keys;
  B(
    c,
    {
      keys: function hn(e) {
        return He(e) ? Ge(Y(e)) : Ge(e);
      },
    },
    !Ue || Je
  );
  var ze,
    Ye,
    Ve = 0 !== new Date(-0xc782b5b342b24).getUTCMonth(),
    Xe = new Date(-0x55d318d56a724),
    Ze = new Date(14496624e5),
    Qe = "Mon, 01 Jan -45875 11:59:59 GMT" !== Xe.toUTCString();
  Xe.getTimezoneOffset() < -720
    ? ((ze = "Tue Jan 02 -45875" !== Xe.toDateString()),
      (Ye = !/^Thu Dec 10 2015 \d\d:\d\d:\d\d GMT[-\+]\d\d\d\d(?: |$)/.test(
        Ze.toString()
      )))
    : ((ze = "Mon Jan 01 -45875" !== Xe.toDateString()),
      (Ye = !/^Wed Dec 09 2015 \d\d:\d\d:\d\d GMT[-\+]\d\d\d\d(?: |$)/.test(
        Ze.toString()
      )));
  var Ke = s.bind(Date.prototype.getFullYear),
    $e = s.bind(Date.prototype.getMonth),
    et = s.bind(Date.prototype.getDate),
    tt = s.bind(Date.prototype.getUTCFullYear),
    nt = s.bind(Date.prototype.getUTCMonth),
    rt = s.bind(Date.prototype.getUTCDate),
    ot = s.bind(Date.prototype.getUTCDay),
    it = s.bind(Date.prototype.getUTCHours),
    at = s.bind(Date.prototype.getUTCMinutes),
    st = s.bind(Date.prototype.getUTCSeconds),
    ut = s.bind(Date.prototype.getUTCMilliseconds),
    ct = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    lt = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    ft = function ft(e, t) {
      return et(new Date(t, e, 0));
    };
  B(
    Date.prototype,
    {
      getFullYear: function dn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = Ke(this);
        return e < 0 && 11 < $e(this) ? e + 1 : e;
      },
      getMonth: function gn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = Ke(this),
          t = $e(this);
        return e < 0 && 11 < t ? 0 : t;
      },
      getDate: function yn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = Ke(this),
          t = $e(this),
          n = et(this);
        return e < 0 && 11 < t ? (12 === t ? n : ft(0, e + 1) - n + 1) : n;
      },
      getUTCFullYear: function vn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = tt(this);
        return e < 0 && 11 < nt(this) ? e + 1 : e;
      },
      getUTCMonth: function mn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = tt(this),
          t = nt(this);
        return e < 0 && 11 < t ? 0 : t;
      },
      getUTCDate: function bn() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = tt(this),
          t = nt(this),
          n = rt(this);
        return e < 0 && 11 < t ? (12 === t ? n : ft(0, e + 1) - n + 1) : n;
      },
    },
    Ve
  ),
    B(
      Date.prototype,
      {
        toUTCString: function wn() {
          if (!(this && this instanceof Date))
            throw new TypeError("this is not a Date object.");
          var e = ot(this),
            t = rt(this),
            n = nt(this),
            r = tt(this),
            o = it(this),
            i = at(this),
            a = st(this);
          return (
            ct[e] +
            ", " +
            (t < 10 ? "0" + t : t) +
            " " +
            lt[n] +
            " " +
            r +
            " " +
            (o < 10 ? "0" + o : o) +
            ":" +
            (i < 10 ? "0" + i : i) +
            ":" +
            (a < 10 ? "0" + a : a) +
            " GMT"
          );
        },
      },
      Ve || Qe
    ),
    B(
      Date.prototype,
      {
        toDateString: function xn() {
          if (!(this && this instanceof Date))
            throw new TypeError("this is not a Date object.");
          var e = this.getDay(),
            t = this.getDate(),
            n = this.getMonth(),
            r = this.getFullYear();
          return ct[e] + " " + lt[n] + " " + (t < 10 ? "0" + t : t) + " " + r;
        },
      },
      Ve || ze
    ),
    (Ve || Ye) &&
      ((Date.prototype.toString = function An() {
        if (!(this && this instanceof Date))
          throw new TypeError("this is not a Date object.");
        var e = this.getDay(),
          t = this.getDate(),
          n = this.getMonth(),
          r = this.getFullYear(),
          o = this.getHours(),
          i = this.getMinutes(),
          a = this.getSeconds(),
          s = this.getTimezoneOffset(),
          u = Math.floor(Math.abs(s) / 60),
          c = Math.floor(Math.abs(s) % 60);
        return (
          ct[e] +
          " " +
          lt[n] +
          " " +
          (t < 10 ? "0" + t : t) +
          " " +
          r +
          " " +
          (o < 10 ? "0" + o : o) +
          ":" +
          (i < 10 ? "0" + i : i) +
          ":" +
          (a < 10 ? "0" + a : a) +
          " GMT" +
          (0 < s ? "-" : "+") +
          (u < 10 ? "0" + u : u) +
          (c < 10 ? "0" + c : c)
        );
      }),
      q &&
        c.defineProperty(Date.prototype, "toString", {
          configurable: !0,
          enumerable: !1,
          writable: !0,
        }));
  var pt = -621987552e5,
    ht = "-000001",
    dt =
      Date.prototype.toISOString &&
      -1 === new Date(pt).toISOString().indexOf(ht),
    gt =
      Date.prototype.toISOString &&
      "1969-12-31T23:59:59.999Z" !== new Date(-1).toISOString(),
    yt = s.bind(Date.prototype.getTime);
  B(
    Date.prototype,
    {
      toISOString: function Sn() {
        if (!isFinite(this) || !isFinite(yt(this)))
          throw new RangeError(
            "Date.prototype.toISOString called on non-finite value."
          );
        var e = tt(this),
          t = nt(this);
        e += Math.floor(t / 12);
        var n = [
          (t = ((t % 12) + 12) % 12) + 1,
          rt(this),
          it(this),
          at(this),
          st(this),
        ];
        e =
          (e < 0 ? "-" : 9999 < e ? "+" : "") +
          X("00000" + Math.abs(e), 0 <= e && e <= 9999 ? -4 : -6);
        for (var r = 0; r < n.length; ++r) n[r] = X("00" + n[r], -2);
        return (
          e +
          "-" +
          Y(n, 0, 2).join("-") +
          "T" +
          Y(n, 2).join(":") +
          "." +
          X("000" + ut(this), -3) +
          "Z"
        );
      },
    },
    dt || gt
  ),
    (function () {
      try {
        return (
          Date.prototype.toJSON &&
          null === new Date(NaN).toJSON() &&
          -1 !== new Date(pt).toJSON().indexOf(ht) &&
          Date.prototype.toJSON.call({
            toISOString: function () {
              return !0;
            },
          })
        );
      } catch (cn) {
        return !1;
      }
    })() ||
      (Date.prototype.toJSON = function Tn() {
        var e = c(this),
          t = U.ToPrimitive(e);
        if ("number" == typeof t && !isFinite(t)) return null;
        var n = e.toISOString;
        if (!N(n)) throw new TypeError("toISOString property is not callable");
        return n.call(e);
      });
  var vt = 1e15 === Date.parse("+033658-09-27T01:46:40.000Z"),
    mt =
      !isNaN(Date.parse("2012-04-04T24:00:00.500Z")) ||
      !isNaN(Date.parse("2012-11-31T23:59:59.000Z")) ||
      !isNaN(Date.parse("2012-12-31T23:59:60.000Z"));
  if (isNaN(Date.parse("2000-01-01T00:00:00.000Z")) || mt || !vt) {
    var bt = Math.pow(2, 31) - 1,
      wt = H(new Date(1970, 0, 1, 0, 0, 0, bt + 1).getTime());
    Date = (function (d) {
      var h = function m(e, t, n, r, o, i, a) {
          var s,
            u = arguments.length;
          if (this instanceof d) {
            var c = i,
              l = a;
            if (wt && 7 <= u && bt < a) {
              var f = Math.floor(a / bt) * bt,
                p = Math.floor(f / 1e3);
              (c += p), (l -= 1e3 * p);
            }
            s =
              1 === u && w(e) === e
                ? new d(h.parse(e))
                : 7 <= u
                ? new d(e, t, n, r, o, c, l)
                : 6 <= u
                ? new d(e, t, n, r, o, c)
                : 5 <= u
                ? new d(e, t, n, r, o)
                : 4 <= u
                ? new d(e, t, n, r)
                : 3 <= u
                ? new d(e, t, n)
                : 2 <= u
                ? new d(e, t)
                : 1 <= u
                ? new d(e instanceof d ? +e : e)
                : new d();
          } else s = d.apply(this, arguments);
          return W(s) || B(s, { constructor: h }, !0), s;
        },
        g = new RegExp(
          "^(\\d{4}|[+-]\\d{6})(?:-(\\d{2})(?:-(\\d{2})(?:T(\\d{2}):(\\d{2})(?::(\\d{2})(?:(\\.\\d{1,}))?)?(Z|(?:([-+])(\\d{2}):(\\d{2})))?)?)?)?$"
        ),
        r = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334, 365],
        y = function y(e, t) {
          var n = 1 < t ? 1 : 0;
          return (
            r[t] +
            Math.floor((e - 1969 + n) / 4) -
            Math.floor((e - 1901 + n) / 100) +
            Math.floor((e - 1601 + n) / 400) +
            365 * (e - 1970)
          );
        },
        v = function v(e) {
          var t = 0,
            n = e;
          if (wt && bt < n) {
            var r = Math.floor(n / bt) * bt,
              o = Math.floor(r / 1e3);
            (t += o), (n -= 1e3 * o);
          }
          return x(new d(1970, 0, 1, 0, 0, t, n));
        };
      for (var e in d) G(d, e) && (h[e] = d[e]);
      return (
        B(h, { now: d.now, UTC: d.UTC }, !0),
        (h.prototype = d.prototype),
        B(h.prototype, { constructor: h }, !0),
        B(h, {
          parse: function b(e) {
            var t = g.exec(e);
            if (t) {
              var n,
                r = x(t[1]),
                o = x(t[2] || 1) - 1,
                i = x(t[3] || 1) - 1,
                a = x(t[4] || 0),
                s = x(t[5] || 0),
                u = x(t[6] || 0),
                c = Math.floor(1e3 * x(t[7] || 0)),
                l = Boolean(t[4] && !t[8]),
                f = "-" === t[9] ? 1 : -1,
                p = x(t[10] || 0),
                h = x(t[11] || 0);
              return a < (0 < s || 0 < u || 0 < c ? 24 : 25) &&
                s < 60 &&
                u < 60 &&
                c < 1e3 &&
                -1 < o &&
                o < 12 &&
                p < 24 &&
                h < 60 &&
                -1 < i &&
                i < y(r, o + 1) - y(r, o) &&
                ((n =
                  1e3 *
                    (60 *
                      ((n = 60 * (24 * (y(r, o) + i) + a + p * f)) +
                        s +
                        h * f) +
                      u) +
                  c),
                l && (n = v(n)),
                -864e13 <= n && n <= 864e13)
                ? n
                : NaN;
            }
            return d.parse.apply(this, arguments);
          },
        }),
        h
      );
    })(Date);
  }
  Date.now ||
    (Date.now = function Cn() {
      return new Date().getTime();
    });
  var xt =
      o.toFixed &&
      ("0.000" !== (8e-5).toFixed(3) ||
        "1" !== (0.9).toFixed(0) ||
        "1.25" !== (1.255).toFixed(2) ||
        "1000000000000000128" !== (0xde0b6b3a7640080).toFixed(0)),
    At = {
      base: 1e7,
      size: 6,
      data: [0, 0, 0, 0, 0, 0],
      multiply: function On(e, t) {
        for (var n = -1, r = t; ++n < At.size; )
          (r += e * At.data[n]),
            (At.data[n] = r % At.base),
            (r = Math.floor(r / At.base));
      },
      divide: function jn(e) {
        for (var t = At.size, n = 0; 0 <= --t; )
          (n += At.data[t]),
            (At.data[t] = Math.floor(n / e)),
            (n = (n % e) * At.base);
      },
      numToString: function En() {
        for (var e = At.size, t = ""; 0 <= --e; )
          if ("" !== t || 0 === e || 0 !== At.data[e]) {
            var n = w(At.data[e]);
            "" === t ? (t = n) : (t += X("0000000", 0, 7 - n.length) + n);
          }
        return t;
      },
      pow: function In(e, t, n) {
        return 0 === t
          ? n
          : t % 2 == 1
          ? In(e, t - 1, n * e)
          : In(e * e, t / 2, n);
      },
      log: function Nn(e) {
        for (var t = 0, n = e; 4096 <= n; ) (t += 12), (n /= 4096);
        for (; 2 <= n; ) (t += 1), (n /= 2);
        return t;
      },
    };
  B(
    o,
    {
      toFixed: function Pn(e) {
        var t, n, r, o, i, a, s, u;
        if (((t = x(e)), (t = H(t) ? 0 : Math.floor(t)) < 0 || 20 < t))
          throw new RangeError(
            "Number.toFixed called with invalid number of decimals"
          );
        if (((n = x(this)), H(n))) return "NaN";
        if (n <= -1e21 || 1e21 <= n) return w(n);
        if (((r = ""), n < 0 && ((r = "-"), (n = -n)), (o = "0"), 1e-21 < n))
          if (
            ((a =
              (i = At.log(n * At.pow(2, 69, 1)) - 69) < 0
                ? n * At.pow(2, -i, 1)
                : n / At.pow(2, i, 1)),
            (a *= 4503599627370496),
            0 < (i = 52 - i))
          ) {
            for (At.multiply(0, a), s = t; 7 <= s; )
              At.multiply(1e7, 0), (s -= 7);
            for (At.multiply(At.pow(10, s, 1), 0), s = i - 1; 23 <= s; )
              At.divide(1 << 23), (s -= 23);
            At.divide(1 << s),
              At.multiply(1, 1),
              At.divide(2),
              (o = At.numToString());
          } else
            At.multiply(0, a),
              At.multiply(1 << -i, 0),
              (o = At.numToString() + X("0.00000000000000000000", 2, 2 + t));
        return (o =
          0 < t
            ? (u = o.length) <= t
              ? r + X("0.0000000000000000000", 0, t - u + 2) + o
              : r + X(o, 0, u - t) + "." + X(o, u - t)
            : r + o);
      },
    },
    xt
  );
  var St,
    Tt,
    Ct = (function () {
      try {
        return "1" === (1).toPrecision(undefined);
      } catch (cn) {
        return !0;
      }
    })(),
    Ot = o.toPrecision;
  B(
    o,
    {
      toPrecision: function kn(e) {
        return void 0 === e ? Ot.call(this) : Ot.call(this, e);
      },
    },
    Ct
  ),
    2 !== "ab".split(/(?:ab)*/).length ||
    4 !== ".".split(/(.?)(.?)/).length ||
    "t" === "tesst".split(/(s)*/)[1] ||
    4 !== "test".split(/(?:)/, -1).length ||
    "".split(/.?/).length ||
    1 < ".".split(/()()/).length
      ? ((St = "undefined" == typeof /()??/.exec("")[1]),
        (Tt = Math.pow(2, 32) - 1),
        (r.split = function (e, t) {
          var n = String(this);
          if (void 0 === e && 0 === t) return [];
          if (!p(e)) return Z(this, e, t);
          var r,
            o,
            i,
            a,
            s = [],
            u =
              (e.ignoreCase ? "i" : "") +
              (e.multiline ? "m" : "") +
              (e.unicode ? "u" : "") +
              (e.sticky ? "y" : ""),
            c = 0,
            l = new RegExp(e.source, u + "g");
          St || (r = new RegExp("^" + l.source + "$(?!\\s)", u));
          var f = void 0 === t ? Tt : U.ToUint32(t);
          for (
            o = l.exec(n);
            o &&
            !(
              c < (i = o.index + o[0].length) &&
              (K(s, X(n, c, o.index)),
              !St &&
                1 < o.length &&
                o[0].replace(r, function () {
                  for (var e = 1; e < arguments.length - 2; e++)
                    "undefined" == typeof arguments[e] && (o[e] = void 0);
                }),
              1 < o.length && o.index < n.length && d.apply(s, Y(o, 1)),
              (a = o[0].length),
              (c = i),
              s.length >= f)
            );

          )
            l.lastIndex === o.index && l.lastIndex++, (o = l.exec(n));
          return (
            c === n.length ? (!a && l.test("")) || K(s, "") : K(s, X(n, c)),
            s.length > f ? Y(s, 0, f) : s
          );
        }))
      : "0".split(void 0, 0).length &&
        (r.split = function Dn(e, t) {
          return void 0 === e && 0 === t ? [] : Z(this, e, t);
        });
  var jt,
    Et = r.replace;
  ((jt = []),
  "x".replace(/x(.)?/g, function (e, t) {
    K(jt, t);
  }),
  1 === jt.length && "undefined" == typeof jt[0]) ||
    (r.replace = function Mn(o, i) {
      var e = N(i),
        t = p(o) && /\)[*?]/.test(o.source);
      if (e && t) {
        var n = function (e) {
          var t = arguments.length,
            n = o.lastIndex;
          o.lastIndex = 0;
          var r = o.exec(e) || [];
          return (
            (o.lastIndex = n),
            K(r, arguments[t - 2], arguments[t - 1]),
            i.apply(this, r)
          );
        };
        return Et.call(this, o, n);
      }
      return Et.call(this, o, i);
    });
  var It = r.substr,
    Nt = "".substr && "b" !== "0b".substr(-1);
  B(
    r,
    {
      substr: function Ln(e, t) {
        var n = e;
        return e < 0 && (n = m(this.length + e, 0)), It.call(this, n, t);
      },
    },
    Nt
  );
  var Pt =
      "\t\n\x0B\f\r \xa0\u1680\u180e\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u202f\u205f\u3000\u2028\u2029\ufeff",
    kt = "\u200b",
    Dt = "[" + Pt + "]",
    Mt = new RegExp("^" + Dt + Dt + "*"),
    Lt = new RegExp(Dt + Dt + "*$"),
    Rt = r.trim && (Pt.trim() || !kt.trim());
  B(
    r,
    {
      trim: function _t() {
        if (null == this)
          throw new TypeError("can't convert " + this + " to object");
        return w(this).replace(Mt, "").replace(Lt, "");
      },
    },
    Rt
  );
  var _t = s.bind(String.prototype.trim),
    Ft =
      r.lastIndexOf && -1 !== "abc\u3042\u3044".lastIndexOf("\u3042\u3044", 2);
  B(
    r,
    {
      lastIndexOf: function sn(e, t) {
        if (null == this)
          throw new TypeError("can't convert " + this + " to object");
        for (
          var n = w(this),
            r = w(e),
            o = 1 < arguments.length ? x(t) : NaN,
            i = H(o) ? Infinity : U.ToInteger(o),
            a = b(m(i, 0), n.length),
            s = r.length,
            u = a + s;
          0 < u;

        ) {
          u = m(0, u - s);
          var c = Q(X(n, u, a + s), r);
          if (-1 !== c) return u + c;
        }
        return -1;
      },
    },
    Ft
  );
  var qt,
    Bt,
    Wt,
    Ht = r.lastIndexOf;
  if (
    (B(
      r,
      {
        lastIndexOf: function sn(e) {
          return Ht.apply(this, arguments);
        },
      },
      1 !== r.lastIndexOf.length
    ),
    (8 === parseInt(Pt + "08") && 22 === parseInt(Pt + "0x16")) ||
      (parseInt =
        ((qt = parseInt),
        (Bt = /^[\-+]?0[xX]/),
        function Rn(e, t) {
          var n = _t(String(e)),
            r = x(t) || (Bt.test(n) ? 16 : 10);
          return qt(n, r);
        })),
    1 / parseFloat("-0") != -Infinity &&
      (parseFloat =
        ((Wt = parseFloat),
        function _n(e) {
          var t = _t(String(e)),
            n = Wt(t);
          return 0 === n && "-" === X(t, 0, 1) ? -0 : n;
        })),
    "RangeError: test" !== String(new RangeError("test")))
  ) {
    var Ut = function An() {
      if (null == this)
        throw new TypeError("can't convert " + this + " to object");
      var e = this.name;
      void 0 === e ? (e = "Error") : "string" != typeof e && (e = w(e));
      var t = this.message;
      return (
        void 0 === t ? (t = "") : "string" != typeof t && (t = w(t)),
        e ? (t ? e + ": " + t : e) : t
      );
    };
    Error.prototype.toString = Ut;
  }
  if (q) {
    var Jt = function (e, t) {
      if ($(e, t)) {
        var n = Object.getOwnPropertyDescriptor(e, t);
        n.configurable && ((n.enumerable = !1), Object.defineProperty(e, t, n));
      }
    };
    Jt(Error.prototype, "message"),
      "" !== Error.prototype.message && (Error.prototype.message = ""),
      Jt(Error.prototype, "name");
  }
  if ("/a/gim" !== String(/a/gim)) {
    var Gt = function An() {
      var e = "/" + this.source + "/";
      return (
        this.global && (e += "g"),
        this.ignoreCase && (e += "i"),
        this.multiline && (e += "m"),
        e
      );
    };
    RegExp.prototype.toString = Gt;
  }
}),
  (function (e, t) {
    "function" == typeof define && define.amd
      ? define(t)
      : "object" == typeof exports
      ? (module.exports = t())
      : (e.returnExports = t());
  })(this, function () {
    "use strict";
    var i,
      o = Function.call.bind(Function.apply),
      M = Function.call.bind(Function.call),
      u = Array.isArray,
      g = Object.keys,
      t = function (e) {
        try {
          return e(), !1;
        } catch (t) {
          return !0;
        }
      },
      a = function a(e) {
        try {
          return e();
        } catch (t) {
          return !1;
        }
      },
      e = (function Ir(e) {
        return function t() {
          return !o(e, this, arguments);
        };
      })(t),
      n = function () {
        return !t(function () {
          Object.defineProperty({}, "x", { get: function () {} });
        });
      },
      s = !!Object.defineProperty && n(),
      r = "foo" === function Nr() {}.name,
      y = Function.call.bind(Array.prototype.forEach),
      c = Function.call.bind(Array.prototype.reduce),
      l = Function.call.bind(Array.prototype.filter),
      f = Function.call.bind(Array.prototype.some),
      v = function (e, t, n, r) {
        (!r && t in e) ||
          (s
            ? Object.defineProperty(e, t, {
                configurable: !0,
                enumerable: !1,
                writable: !0,
                value: n,
              })
            : (e[t] = n));
      },
      L = function (n, r, o) {
        y(g(r), function (e) {
          var t = r[e];
          v(n, e, t, !!o);
        });
      },
      p = Function.call.bind(Object.prototype.toString),
      h =
        "function" == typeof /abc/
          ? function Pr(e) {
              return "function" == typeof e && "[object Function]" === p(e);
            }
          : function kr(e) {
              return "function" == typeof e;
            },
      m = {
        getter: function (e, t, n) {
          if (!s) throw new TypeError("getters require true ES5 support");
          Object.defineProperty(e, t, {
            configurable: !0,
            enumerable: !1,
            get: n,
          });
        },
        proxy: function (t, n, e) {
          if (!s) throw new TypeError("getters require true ES5 support");
          var r = Object.getOwnPropertyDescriptor(t, n);
          Object.defineProperty(e, n, {
            configurable: r.configurable,
            enumerable: r.enumerable,
            get: function o() {
              return t[n];
            },
            set: function i(e) {
              t[n] = e;
            },
          });
        },
        redefine: function (e, t, n) {
          if (s) {
            var r = Object.getOwnPropertyDescriptor(e, t);
            (r.value = n), Object.defineProperty(e, t, r);
          } else e[t] = n;
        },
        defineByDescriptor: function (e, t, n) {
          s ? Object.defineProperty(e, t, n) : "value" in n && (e[t] = n.value);
        },
        preserveToString: function (e, t) {
          t && h(t.toString) && v(e, "toString", t.toString.bind(t), !0);
        },
      },
      d =
        Object.create ||
        function (e, t) {
          var n = function n() {};
          n.prototype = e;
          var r = new n();
          return (
            void 0 !== t &&
              g(t).forEach(function (e) {
                m.defineByDescriptor(r, e, t[e]);
              }),
            r
          );
        },
      b = function (r, t) {
        return (
          !!Object.setPrototypeOf &&
          a(function () {
            var e = function n(e) {
              var t = new r(e);
              return Object.setPrototypeOf(t, n.prototype), t;
            };
            return (
              Object.setPrototypeOf(e, r),
              (e.prototype = d(r.prototype, { constructor: { value: e } })),
              t(e)
            );
          })
        );
      },
      R = (function () {
        if ("undefined" != typeof self) return self;
        if ("undefined" != typeof window) return window;
        if ("undefined" != typeof global) return global;
        throw new Error("unable to locate global object");
      })(),
      w = R.isFinite,
      x = Function.call.bind(String.prototype.indexOf),
      A = Function.apply.bind(Array.prototype.indexOf),
      S = Function.call.bind(Array.prototype.concat),
      T = Function.call.bind(String.prototype.slice),
      _ = Function.call.bind(Array.prototype.push),
      C = Function.apply.bind(Array.prototype.push),
      F = Function.call.bind(Array.prototype.shift),
      O = Math.max,
      j = Math.min,
      E = Math.floor,
      I = Math.abs,
      N = Math.exp,
      P = Math.log,
      k = Math.sqrt,
      D = Function.call.bind(Object.prototype.hasOwnProperty),
      q = function () {},
      B = R.Map,
      W = B && B.prototype["delete"],
      H = B && B.prototype.get,
      U = B && B.prototype.has,
      J = B && B.prototype.set,
      G = R.Symbol || {},
      z = G.species || "@@species",
      Y =
        Number.isNaN ||
        function Dr(e) {
          return e != e;
        },
      V =
        Number.isFinite ||
        function Mr(e) {
          return "number" == typeof e && w(e);
        },
      X = h(Math.sign)
        ? Math.sign
        : function Lr(e) {
            var t = Number(e);
            return 0 === t ? t : Y(t) ? t : t < 0 ? -1 : 1;
          },
      Z = function Rr(e) {
        var t = Number(e);
        return t < -1 || Y(t)
          ? NaN
          : 0 === t || t === Infinity
          ? t
          : -1 === t
          ? -Infinity
          : 1 + t - 1 == 0
          ? t
          : t * (P(1 + t) / (1 + t - 1));
      },
      Q = function $(e) {
        return "[object Arguments]" === p(e);
      },
      K = function $(e) {
        return (
          null !== e &&
          "object" == typeof e &&
          "number" == typeof e.length &&
          0 <= e.length &&
          "[object Array]" !== p(e) &&
          "[object Function]" === p(e.callee)
        );
      },
      $ = Q(arguments) ? Q : K,
      ee = {
        primitive: function (e) {
          return null === e || ("function" != typeof e && "object" != typeof e);
        },
        string: function (e) {
          return "[object String]" === p(e);
        },
        regex: function (e) {
          return "[object RegExp]" === p(e);
        },
        symbol: function (e) {
          return "function" == typeof R.Symbol && "symbol" == typeof e;
        },
      },
      te = function te(e, t, n) {
        var r = e[t];
        v(e, t, n, !0), m.preserveToString(e[t], r);
      },
      ne =
        "function" == typeof G &&
        "function" == typeof G["for"] &&
        ee.symbol(G()),
      re = ee.symbol(G.iterator) ? G.iterator : "_es6-shim iterator_";
    R.Set &&
      "function" == typeof new R.Set()["@@iterator"] &&
      (re = "@@iterator"),
      R.Reflect || v(R, "Reflect", {}, !0);
    var oe,
      ie = R.Reflect,
      ae = String,
      se = "undefined" != typeof document && document ? document.all : null,
      ue =
        null == se
          ? function ue(e) {
              return null == e;
            }
          : function _r(e) {
              return null == e && e !== se;
            },
      ce = {
        Call: function Fr(e, t, n) {
          var r = 2 < arguments.length ? n : [];
          if (!ce.IsCallable(e)) throw new TypeError(e + " is not a function");
          return o(e, t, r);
        },
        RequireObjectCoercible: function (e, t) {
          if (ue(e)) throw new TypeError(t || "Cannot call method on " + e);
          return e;
        },
        TypeIsObject: function (e) {
          return (
            null != e &&
            !0 !== e &&
            !1 !== e &&
            ("function" == typeof e || "object" == typeof e || e === se)
          );
        },
        ToObject: function (e, t) {
          return Object(ce.RequireObjectCoercible(e, t));
        },
        IsCallable: h,
        IsConstructor: function (e) {
          return ce.IsCallable(e);
        },
        ToInt32: function (e) {
          return ce.ToNumber(e) >> 0;
        },
        ToUint32: function (e) {
          return ce.ToNumber(e) >>> 0;
        },
        ToNumber: function (e) {
          if ("[object Symbol]" === p(e))
            throw new TypeError("Cannot convert a Symbol value to a number");
          return +e;
        },
        ToInteger: function (e) {
          var t = ce.ToNumber(e);
          return Y(t) ? 0 : 0 !== t && V(t) ? (0 < t ? 1 : -1) * E(I(t)) : t;
        },
        ToLength: function (e) {
          var t = ce.ToInteger(e);
          return t <= 0
            ? 0
            : t > Number.MAX_SAFE_INTEGER
            ? Number.MAX_SAFE_INTEGER
            : t;
        },
        SameValue: function (e, t) {
          return e === t ? 0 !== e || 1 / e == 1 / t : Y(e) && Y(t);
        },
        SameValueZero: function (e, t) {
          return e === t || (Y(e) && Y(t));
        },
        IsIterable: function (e) {
          return ce.TypeIsObject(e) && ("undefined" != typeof e[re] || $(e));
        },
        GetIterator: function (e) {
          if ($(e)) return new i(e, "value");
          var t = ce.GetMethod(e, re);
          if (!ce.IsCallable(t))
            throw new TypeError("value is not an iterable");
          var n = ce.Call(t, e);
          if (!ce.TypeIsObject(n)) throw new TypeError("bad iterator");
          return n;
        },
        GetMethod: function (e, t) {
          var n = ce.ToObject(e)[t];
          if (!ue(n)) {
            if (!ce.IsCallable(n))
              throw new TypeError("Method not callable: " + t);
            return n;
          }
        },
        IteratorComplete: function (e) {
          return !!e.done;
        },
        IteratorClose: function (e, t) {
          var n = ce.GetMethod(e, "return");
          if (void 0 !== n) {
            var r, o;
            try {
              r = ce.Call(n, e);
            } catch (i) {
              o = i;
            }
            if (!t) {
              if (o) throw o;
              if (!ce.TypeIsObject(r))
                throw new TypeError(
                  "Iterator's return method returned a non-object."
                );
            }
          }
        },
        IteratorNext: function (e, t) {
          var n = 1 < arguments.length ? e.next(t) : e.next();
          if (!ce.TypeIsObject(n)) throw new TypeError("bad iterator");
          return n;
        },
        IteratorStep: function (e) {
          var t = ce.IteratorNext(e);
          return !ce.IteratorComplete(t) && t;
        },
        Construct: function (e, t, n, r) {
          var o = void 0 === n ? e : n;
          if (!r && ie.construct) return ie.construct(e, t, o);
          var i = o.prototype;
          ce.TypeIsObject(i) || (i = Object.prototype);
          var a = d(i),
            s = ce.Call(e, a, t);
          return ce.TypeIsObject(s) ? s : a;
        },
        SpeciesConstructor: function (e, t) {
          var n = e.constructor;
          if (void 0 === n) return t;
          if (!ce.TypeIsObject(n)) throw new TypeError("Bad constructor");
          var r = n[z];
          if (ue(r)) return t;
          if (!ce.IsConstructor(r)) throw new TypeError("Bad @@species");
          return r;
        },
        CreateHTML: function (e, t, n, r) {
          var o = ce.ToString(e),
            i = "<" + t;
          "" !== n &&
            (i +=
              " " + n + '="' + ce.ToString(r).replace(/"/g, "&quot;") + '"');
          return i + ">" + o + "</" + t + ">";
        },
        IsRegExp: function qr(e) {
          if (!ce.TypeIsObject(e)) return !1;
          var t = e[G.match];
          return void 0 !== t ? !!t : ee.regex(e);
        },
        ToString: function Br(e) {
          return ae(e);
        },
      };
    if (s && ne) {
      var le = function le(e) {
        if (ee.symbol(G[e])) return G[e];
        var t = G["for"]("Symbol." + e);
        return (
          Object.defineProperty(G, e, {
            configurable: !1,
            enumerable: !1,
            writable: !1,
            value: t,
          }),
          t
        );
      };
      if (!ee.symbol(G.search)) {
        var fe = le("search"),
          pe = String.prototype.search;
        v(RegExp.prototype, fe, function Wr(e) {
          return ce.Call(pe, e, [this]);
        });
        var he = function Wr(e) {
          var t = ce.RequireObjectCoercible(this);
          if (!ue(e)) {
            var n = ce.GetMethod(e, fe);
            if (void 0 !== n) return ce.Call(n, e, [t]);
          }
          return ce.Call(pe, t, [ce.ToString(e)]);
        };
        te(String.prototype, "search", he);
      }
      if (!ee.symbol(G.replace)) {
        var de = le("replace"),
          ge = String.prototype.replace;
        v(RegExp.prototype, de, function Hr(e, t) {
          return ce.Call(ge, e, [this, t]);
        });
        var ye = function Hr(e, t) {
          var n = ce.RequireObjectCoercible(this);
          if (!ue(e)) {
            var r = ce.GetMethod(e, de);
            if (void 0 !== r) return ce.Call(r, e, [n, t]);
          }
          return ce.Call(ge, n, [ce.ToString(e), t]);
        };
        te(String.prototype, "replace", ye);
      }
      if (!ee.symbol(G.split)) {
        var ve = le("split"),
          me = String.prototype.split;
        v(RegExp.prototype, ve, function Ur(e, t) {
          return ce.Call(me, e, [this, t]);
        });
        var be = function Ur(e, t) {
          var n = ce.RequireObjectCoercible(this);
          if (!ue(e)) {
            var r = ce.GetMethod(e, ve);
            if (void 0 !== r) return ce.Call(r, e, [n, t]);
          }
          return ce.Call(me, n, [ce.ToString(e), t]);
        };
        te(String.prototype, "split", be);
      }
      var we = ee.symbol(G.match),
        xe =
          we &&
          (((oe = {})[G.match] = function () {
            return 42;
          }),
          42 !== "a".match(oe));
      if (!we || xe) {
        var Ae = le("match"),
          Se = String.prototype.match;
        v(RegExp.prototype, Ae, function Jr(e) {
          return ce.Call(Se, e, [this]);
        });
        var Te = function Jr(e) {
          var t = ce.RequireObjectCoercible(this);
          if (!ue(e)) {
            var n = ce.GetMethod(e, Ae);
            if (void 0 !== n) return ce.Call(n, e, [t]);
          }
          return ce.Call(Se, t, [ce.ToString(e)]);
        };
        te(String.prototype, "match", Te);
      }
    }
    var Ce = function Ce(t, n, r) {
        m.preserveToString(n, t),
          Object.setPrototypeOf && Object.setPrototypeOf(t, n),
          s
            ? y(Object.getOwnPropertyNames(t), function (e) {
                e in q || r[e] || m.proxy(t, e, n);
              })
            : y(Object.keys(t), function (e) {
                e in q || r[e] || (n[e] = t[e]);
              }),
          (n.prototype = t.prototype),
          m.redefine(t.prototype, "constructor", n);
      },
      Oe = function () {
        return this;
      },
      je = function (e) {
        s && !D(e, z) && m.getter(e, z, Oe);
      },
      Ee = function (e, t) {
        var n =
          t ||
          function r() {
            return this;
          };
        v(e, re, n), !e[re] && ee.symbol(re) && (e[re] = n);
      },
      Ie = function Ie(e, t, n) {
        s
          ? Object.defineProperty(e, t, {
              configurable: !0,
              enumerable: !0,
              writable: !0,
              value: n,
            })
          : (e[t] = n);
      },
      Ne = function Ne(e, t, n) {
        if ((Ie(e, t, n), !ce.SameValue(e[t], n)))
          throw new TypeError("property is nonconfigurable");
      },
      Pe = function (e, t, n, r) {
        if (!ce.TypeIsObject(e))
          throw new TypeError("Constructor requires `new`: " + t.name);
        var o = t.prototype;
        ce.TypeIsObject(o) || (o = n);
        var i = d(o);
        for (var a in r)
          if (D(r, a)) {
            var s = r[a];
            v(i, a, s, !0);
          }
        return i;
      };
    if (String.fromCodePoint && 1 !== String.fromCodePoint.length) {
      var ke = String.fromCodePoint;
      te(String, "fromCodePoint", function Gr() {
        return ce.Call(ke, this, arguments);
      });
    }
    var De = {
      fromCodePoint: function Gr() {
        for (var e, t = [], n = 0, r = arguments.length; n < r; n++) {
          if (
            ((e = Number(arguments[n])),
            !ce.SameValue(e, ce.ToInteger(e)) || e < 0 || 1114111 < e)
          )
            throw new RangeError("Invalid code point " + e);
          e < 65536
            ? _(t, String.fromCharCode(e))
            : ((e -= 65536),
              _(t, String.fromCharCode(55296 + (e >> 10))),
              _(t, String.fromCharCode((e % 1024) + 56320)));
        }
        return t.join("");
      },
      raw: function zr(e) {
        var t = ce.ToObject(e, "bad callSite"),
          n = ce.ToObject(t.raw, "bad raw value"),
          r = n.length,
          o = ce.ToLength(r);
        if (o <= 0) return "";
        for (
          var i, a, s, u, c = [], l = 0;
          l < o &&
          ((i = ce.ToString(l)),
          (s = ce.ToString(n[i])),
          _(c, s),
          !(o <= l + 1));

        )
          (a = l + 1 < arguments.length ? arguments[l + 1] : ""),
            (u = ce.ToString(a)),
            _(c, u),
            (l += 1);
        return c.join("");
      },
    };
    String.raw &&
      "xy" !== String.raw({ raw: { 0: "x", 1: "y", length: 2 } }) &&
      te(String, "raw", De.raw),
      L(String, De);
    var Me = function Yr(e, t) {
        if (t < 1) return "";
        if (t % 2) return Yr(e, t - 1) + e;
        var n = Yr(e, t / 2);
        return n + n;
      },
      Le = Infinity,
      Re = {
        repeat: function Yr(e) {
          var t = ce.ToString(ce.RequireObjectCoercible(this)),
            n = ce.ToInteger(e);
          if (n < 0 || Le <= n)
            throw new RangeError(
              "repeat count must be less than infinity and not overflow maximum string size"
            );
          return Me(t, n);
        },
        startsWith: function Vr(e, t) {
          var n = ce.ToString(ce.RequireObjectCoercible(this));
          if (ce.IsRegExp(e))
            throw new TypeError('Cannot call method "startsWith" with a regex');
          var r,
            o = ce.ToString(e);
          1 < arguments.length && (r = t);
          var i = O(ce.ToInteger(r), 0);
          return T(n, i, i + o.length) === o;
        },
        endsWith: function Xr(e, t) {
          var n = ce.ToString(ce.RequireObjectCoercible(this));
          if (ce.IsRegExp(e))
            throw new TypeError('Cannot call method "endsWith" with a regex');
          var r,
            o = ce.ToString(e),
            i = n.length;
          1 < arguments.length && (r = t);
          var a = void 0 === r ? i : ce.ToInteger(r),
            s = j(O(a, 0), i);
          return T(n, s - o.length, s) === o;
        },
        includes: function Zr(e, t) {
          if (ce.IsRegExp(e))
            throw new TypeError('"includes" does not accept a RegExp');
          var n,
            r = ce.ToString(e);
          return 1 < arguments.length && (n = t), -1 !== x(this, r, n);
        },
        codePointAt: function Qr(e) {
          var t = ce.ToString(ce.RequireObjectCoercible(this)),
            n = ce.ToInteger(e),
            r = t.length;
          if (0 <= n && n < r) {
            var o = t.charCodeAt(n);
            if (o < 55296 || 56319 < o || n + 1 === r) return o;
            var i = t.charCodeAt(n + 1);
            return i < 56320 || 57343 < i
              ? o
              : 1024 * (o - 55296) + (i - 56320) + 65536;
          }
        },
      };
    if (
      (String.prototype.includes &&
        !1 !== "a".includes("a", Infinity) &&
        te(String.prototype, "includes", Re.includes),
      String.prototype.startsWith && String.prototype.endsWith)
    ) {
      var _e = t(function () {
          "/a/".startsWith(/a/);
        }),
        Fe = a(function () {
          return !1 === "abc".startsWith("a", Infinity);
        });
      (_e && Fe) ||
        (te(String.prototype, "startsWith", Re.startsWith),
        te(String.prototype, "endsWith", Re.endsWith));
    }
    ne &&
      (a(function () {
        var e = /a/;
        return (e[G.match] = !1), "/a/".startsWith(e);
      }) || te(String.prototype, "startsWith", Re.startsWith),
      a(function () {
        var e = /a/;
        return (e[G.match] = !1), "/a/".endsWith(e);
      }) || te(String.prototype, "endsWith", Re.endsWith),
      a(function () {
        var e = /a/;
        return (e[G.match] = !1), "/a/".includes(e);
      }) || te(String.prototype, "includes", Re.includes));
    L(String.prototype, Re);
    var qe = [
        "\t\n\x0B\f\r \xa0\u1680\u180e\u2000\u2001\u2002\u2003",
        "\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u202f\u205f\u3000\u2028",
        "\u2029\ufeff",
      ].join(""),
      Be = new RegExp("(^[" + qe + "]+)|([" + qe + "]+$)", "g"),
      We = function Kr() {
        return ce.ToString(ce.RequireObjectCoercible(this)).replace(Be, "");
      },
      He = ["\x85", "\u200b", "\ufffe"].join(""),
      Ue = new RegExp("[" + He + "]", "g"),
      Je = /^[-+]0x[0-9a-f]+$/i,
      Ge = He.trim().length !== He.length;
    v(String.prototype, "trim", We, Ge);
    var ze = function (e) {
        return { value: e, done: 0 === arguments.length };
      },
      Ye = function (e) {
        ce.RequireObjectCoercible(e), (this._s = ce.ToString(e)), (this._i = 0);
      };
    (Ye.prototype.next = function () {
      var e = this._s,
        t = this._i;
      if (void 0 === e || t >= e.length) return (this._s = void 0), ze();
      var n,
        r,
        o = e.charCodeAt(t);
      return (
        (r =
          o < 55296 || 56319 < o || t + 1 === e.length
            ? 1
            : (n = e.charCodeAt(t + 1)) < 56320 || 57343 < n
            ? 1
            : 2),
        (this._i = t + r),
        ze(e.substr(t, r))
      );
    }),
      Ee(Ye.prototype),
      Ee(String.prototype, function () {
        return new Ye(this);
      });
    var Ve = {
      from: function $r(e, t, n) {
        var r,
          o,
          i,
          a,
          s,
          u,
          c = this;
        if ((1 < arguments.length && (r = t), void 0 === r)) o = !1;
        else {
          if (!ce.IsCallable(r))
            throw new TypeError(
              "Array.from: when provided, the second argument must be a function"
            );
          2 < arguments.length && (i = n), (o = !0);
        }
        if (void 0 !== ($(e) || ce.GetMethod(e, re))) {
          s = ce.IsConstructor(c) ? Object(new c()) : [];
          var l,
            f,
            p = ce.GetIterator(e);
          for (u = 0; !1 !== (l = ce.IteratorStep(p)); ) {
            f = l.value;
            try {
              o && (f = void 0 === i ? r(f, u) : M(r, i, f, u)), (s[u] = f);
            } catch (g) {
              throw (ce.IteratorClose(p, !0), g);
            }
            u += 1;
          }
          a = u;
        } else {
          var h,
            d = ce.ToObject(e);
          for (
            a = ce.ToLength(d.length),
              s = ce.IsConstructor(c) ? Object(new c(a)) : new Array(a),
              u = 0;
            u < a;
            ++u
          )
            (h = d[u]),
              o && (h = void 0 === i ? r(h, u) : M(r, i, h, u)),
              Ne(s, u, h);
        }
        return (s.length = a), s;
      },
      of: function eo() {
        for (
          var e = arguments.length,
            t = this,
            n = u(t) || !ce.IsCallable(t) ? new Array(e) : ce.Construct(t, [e]),
            r = 0;
          r < e;
          ++r
        )
          Ne(n, r, arguments[r]);
        return (n.length = e), n;
      },
    };
    L(Array, Ve),
      je(Array),
      L(
        (i = function (e, t) {
          (this.i = 0), (this.array = e), (this.kind = t);
        }).prototype,
        {
          next: function () {
            var e = this.i,
              t = this.array;
            if (!(this instanceof i))
              throw new TypeError("Not an ArrayIterator");
            if (void 0 !== t)
              for (var n = ce.ToLength(t.length); e < n; e++) {
                var r,
                  o = this.kind;
                return (
                  "key" === o
                    ? (r = e)
                    : "value" === o
                    ? (r = t[e])
                    : "entry" === o && (r = [e, t[e]]),
                  (this.i = e + 1),
                  ze(r)
                );
              }
            return (this.array = void 0), ze();
          },
        }
      ),
      Ee(i.prototype),
      Array.of === Ve.of ||
        (function () {
          var t = function t(e) {
            this.length = e;
          };
          t.prototype = [];
          var e = Array.of.apply(t, [1, 2]);
          return e instanceof t && 2 === e.length;
        })() ||
        te(Array, "of", Ve.of);
    var Xe = {
      copyWithin: function to(e, t, n) {
        var r,
          o = ce.ToObject(this),
          i = ce.ToLength(o.length),
          a = ce.ToInteger(e),
          s = ce.ToInteger(t),
          u = a < 0 ? O(i + a, 0) : j(a, i),
          c = s < 0 ? O(i + s, 0) : j(s, i);
        2 < arguments.length && (r = n);
        var l = void 0 === r ? i : ce.ToInteger(r),
          f = l < 0 ? O(i + l, 0) : j(l, i),
          p = j(f - c, i - u),
          h = 1;
        for (
          c < u && u < c + p && ((h = -1), (c += p - 1), (u += p - 1));
          0 < p;

        )
          c in o ? (o[u] = o[c]) : delete o[u], (c += h), (u += h), (p -= 1);
        return o;
      },
      fill: function no(e, t, n) {
        var r, o;
        1 < arguments.length && (r = t), 2 < arguments.length && (o = n);
        var i = ce.ToObject(this),
          a = ce.ToLength(i.length);
        r = ce.ToInteger(void 0 === r ? 0 : r);
        for (
          var s = (o = ce.ToInteger(void 0 === o ? a : o)) < 0 ? a + o : o,
            u = r < 0 ? O(a + r, 0) : j(r, a);
          u < a && u < s;
          ++u
        )
          i[u] = e;
        return i;
      },
      find: function ro(e, t) {
        var n = ce.ToObject(this),
          r = ce.ToLength(n.length);
        if (!ce.IsCallable(e))
          throw new TypeError("Array#find: predicate must be a function");
        for (var o, i = 1 < arguments.length ? t : null, a = 0; a < r; a++)
          if (((o = n[a]), i)) {
            if (M(e, i, o, a, n)) return o;
          } else if (e(o, a, n)) return o;
      },
      findIndex: function oo(e, t) {
        var n = ce.ToObject(this),
          r = ce.ToLength(n.length);
        if (!ce.IsCallable(e))
          throw new TypeError("Array#findIndex: predicate must be a function");
        for (var o = 1 < arguments.length ? t : null, i = 0; i < r; i++)
          if (o) {
            if (M(e, o, n[i], i, n)) return i;
          } else if (e(n[i], i, n)) return i;
        return -1;
      },
      keys: function g() {
        return new i(this, "key");
      },
      values: function io() {
        return new i(this, "value");
      },
      entries: function ao() {
        return new i(this, "entry");
      },
    };
    if (
      (Array.prototype.keys &&
        !ce.IsCallable([1].keys().next) &&
        delete Array.prototype.keys,
      Array.prototype.entries &&
        !ce.IsCallable([1].entries().next) &&
        delete Array.prototype.entries,
      Array.prototype.keys &&
        Array.prototype.entries &&
        !Array.prototype.values &&
        Array.prototype[re] &&
        (L(Array.prototype, { values: Array.prototype[re] }),
        ee.symbol(G.unscopables) &&
          (Array.prototype[G.unscopables].values = !0)),
      r && Array.prototype.values && "values" !== Array.prototype.values.name)
    ) {
      var Ze = Array.prototype.values;
      te(Array.prototype, "values", function io() {
        return ce.Call(Ze, this, arguments);
      }),
        v(Array.prototype, re, Array.prototype.values, !0);
    }
    L(Array.prototype, Xe),
      1 / [!0].indexOf(!0, -0) < 0 &&
        v(
          Array.prototype,
          "indexOf",
          function so() {
            var e = A(this, arguments);
            return 0 === e && 1 / e < 0 ? 0 : e;
          },
          !0
        ),
      Ee(Array.prototype, function () {
        return this.values();
      }),
      Object.getPrototypeOf && Ee(Object.getPrototypeOf([].values()));
    var Qe,
      Ke = a(function () {
        return 0 === Array.from({ length: -1 }).length;
      }),
      $e =
        1 === (Qe = Array.from([0].entries())).length &&
        u(Qe[0]) &&
        0 === Qe[0][0] &&
        0 === Qe[0][1];
    if (
      ((Ke && $e) || te(Array, "from", Ve.from),
      !a(function () {
        return Array.from([0], void 0);
      }))
    ) {
      var et = Array.from;
      te(Array, "from", function $r(e, t) {
        return 1 < arguments.length && void 0 !== t
          ? ce.Call(et, this, arguments)
          : M(et, this, e);
      });
    }
    var tt = -(Math.pow(2, 32) - 1),
      nt = function (e, t) {
        var n = { length: tt };
        return (
          (n[t ? (n.length >>> 0) - 1 : 0] = !0),
          a(function () {
            return (
              M(
                e,
                n,
                function () {
                  throw new RangeError("should not reach here");
                },
                []
              ),
              !0
            );
          })
        );
      };
    if (!nt(Array.prototype.forEach)) {
      var rt = Array.prototype.forEach;
      te(
        Array.prototype,
        "forEach",
        function uo() {
          return ce.Call(rt, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.map)) {
      var ot = Array.prototype.map;
      te(
        Array.prototype,
        "map",
        function co() {
          return ce.Call(ot, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.filter)) {
      var it = Array.prototype.filter;
      te(
        Array.prototype,
        "filter",
        function lo() {
          return ce.Call(it, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.some)) {
      var at = Array.prototype.some;
      te(
        Array.prototype,
        "some",
        function fo() {
          return ce.Call(at, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.every)) {
      var st = Array.prototype.every;
      te(
        Array.prototype,
        "every",
        function po() {
          return ce.Call(st, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.reduce)) {
      var ut = Array.prototype.reduce;
      te(
        Array.prototype,
        "reduce",
        function ho() {
          return ce.Call(ut, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    if (!nt(Array.prototype.reduceRight, !0)) {
      var ct = Array.prototype.reduceRight;
      te(
        Array.prototype,
        "reduceRight",
        function go() {
          return ce.Call(ct, 0 <= this.length ? this : [], arguments);
        },
        !0
      );
    }
    var lt,
      ft = 8 !== Number("0o10"),
      pt = 2 !== Number("0b10"),
      ht = f(He, function (e) {
        return 0 === Number(e + 0 + e);
      });
    if (ft || pt || ht) {
      var dt = Number,
        gt = /^0b[01]+$/i,
        yt = /^0o[0-7]+$/i,
        vt = gt.test.bind(gt),
        mt = yt.test.bind(yt),
        bt = function (e) {
          var t;
          if (
            "function" == typeof e.valueOf &&
            ((t = e.valueOf()), ee.primitive(t))
          )
            return t;
          if (
            "function" == typeof e.toString &&
            ((t = e.toString()), ee.primitive(t))
          )
            return t;
          throw new TypeError("No default value");
        },
        wt = Ue.test.bind(Ue),
        xt = Je.test.bind(Je),
        At = (lt = function yo(e) {
          var t;
          "string" ==
            typeof (t =
              0 < arguments.length
                ? ee.primitive(e)
                  ? e
                  : bt(e, "number")
                : 0) &&
            ((t = ce.Call(We, t)),
            vt(t)
              ? (t = parseInt(T(t, 2), 2))
              : mt(t)
              ? (t = parseInt(T(t, 2), 8))
              : (wt(t) || xt(t)) && (t = NaN));
          var n = this,
            r = a(function () {
              return dt.prototype.valueOf.call(n), !0;
            });
          return n instanceof lt && !r ? new dt(t) : dt(t);
        });
      Ce(dt, At, {}),
        L(At, {
          NaN: dt.NaN,
          MAX_VALUE: dt.MAX_VALUE,
          MIN_VALUE: dt.MIN_VALUE,
          NEGATIVE_INFINITY: dt.NEGATIVE_INFINITY,
          POSITIVE_INFINITY: dt.POSITIVE_INFINITY,
        }),
        (Number = At),
        m.redefine(R, "Number", At);
    }
    var St = Math.pow(2, 53) - 1;
    L(Number, {
      MAX_SAFE_INTEGER: St,
      MIN_SAFE_INTEGER: -St,
      EPSILON: 2220446049250313e-31,
      parseInt: R.parseInt,
      parseFloat: R.parseFloat,
      isFinite: V,
      isInteger: function vo(e) {
        return V(e) && ce.ToInteger(e) === e;
      },
      isSafeInteger: function mo(e) {
        return Number.isInteger(e) && I(e) <= Number.MAX_SAFE_INTEGER;
      },
      isNaN: Y,
    }),
      v(Number, "parseInt", R.parseInt, Number.parseInt !== R.parseInt),
      1 ===
        [, 1].find(function () {
          return !0;
        }) && te(Array.prototype, "find", Xe.find),
      0 !==
        [, 1].findIndex(function () {
          return !0;
        }) && te(Array.prototype, "findIndex", Xe.findIndex);
    var Tt,
      Ct,
      Ot,
      jt = Function.bind.call(
        Function.bind,
        Object.prototype.propertyIsEnumerable
      ),
      Et = function Et(e, t) {
        s && jt(e, t) && Object.defineProperty(e, t, { enumerable: !1 });
      },
      It = function It() {
        for (
          var e = Number(this),
            t = arguments.length,
            n = t - e,
            r = new Array(n < 0 ? 0 : n),
            o = e;
          o < t;
          ++o
        )
          r[o - e] = arguments[o];
        return r;
      },
      Nt = function Nt(n) {
        return function r(e, t) {
          return (e[t] = n[t]), e;
        };
      },
      Pt = function (e, t) {
        var n,
          r = g(Object(t));
        return (
          ce.IsCallable(Object.getOwnPropertySymbols) &&
            (n = l(Object.getOwnPropertySymbols(Object(t)), jt(t))),
          c(S(r, n || []), Nt(t), e)
        );
      },
      kt = {
        assign: function (e) {
          var t = ce.ToObject(e, "Cannot convert undefined or null to object");
          return c(ce.Call(It, 1, arguments), Pt, t);
        },
        is: function bo(e, t) {
          return ce.SameValue(e, t);
        },
      };
    if (
      (Object.assign &&
        Object.preventExtensions &&
        (function () {
          var e = Object.preventExtensions({ 1: 2 });
          try {
            Object.assign(e, "xy");
          } catch (t) {
            return "y" === e[1];
          }
        })() &&
        te(Object, "assign", kt.assign),
      L(Object, kt),
      s)
    ) {
      var Dt = {
        setPrototypeOf: (function (e, t) {
          var n,
            r = function (e, t) {
              if (!ce.TypeIsObject(e))
                throw new TypeError("cannot set prototype on a non-object");
              if (null !== t && !ce.TypeIsObject(t))
                throw new TypeError(
                  "can only set prototype to an object or null" + t
                );
            },
            o = function (e, t) {
              return r(e, t), M(n, e, t), e;
            };
          try {
            (n = e.getOwnPropertyDescriptor(e.prototype, t).set),
              M(n, {}, null);
          } catch (i) {
            if (e.prototype !== {}[t]) return;
            (n = function (e) {
              this[t] = e;
            }),
              (o.polyfill = o(o({}, null), e.prototype) instanceof e);
          }
          return o;
        })(Object, "__proto__"),
      };
      L(Object, Dt);
    }
    if (
      (Object.setPrototypeOf &&
        Object.getPrototypeOf &&
        null !== Object.getPrototypeOf(Object.setPrototypeOf({}, null)) &&
        null === Object.getPrototypeOf(Object.create(null)) &&
        ((Tt = Object.create(null)),
        (Ct = Object.getPrototypeOf),
        (Ot = Object.setPrototypeOf),
        (Object.getPrototypeOf = function (e) {
          var t = Ct(e);
          return t === Tt ? null : t;
        }),
        (Object.setPrototypeOf = function (e, t) {
          return Ot(e, null === t ? Tt : t);
        }),
        (Object.setPrototypeOf.polyfill = !1)),
      !!t(function () {
        Object.keys("foo");
      }))
    ) {
      var Mt = Object.keys;
      te(Object, "keys", function g(e) {
        return Mt(ce.ToObject(e));
      }),
        (g = Object.keys);
    }
    if (
      t(function () {
        Object.keys(/a/g);
      })
    ) {
      var Lt = Object.keys;
      te(Object, "keys", function g(e) {
        if (ee.regex(e)) {
          var t = [];
          for (var n in e) D(e, n) && _(t, n);
          return t;
        }
        return Lt(e);
      }),
        (g = Object.keys);
    }
    if (
      Object.getOwnPropertyNames &&
      !!t(function () {
        Object.getOwnPropertyNames("foo");
      })
    ) {
      var Rt =
          "object" == typeof window ? Object.getOwnPropertyNames(window) : [],
        _t = Object.getOwnPropertyNames;
      te(Object, "getOwnPropertyNames", function wo(e) {
        var t = ce.ToObject(e);
        if ("[object Window]" === p(t))
          try {
            return _t(t);
          } catch (n) {
            return S([], Rt);
          }
        return _t(t);
      });
    }
    if (
      Object.getOwnPropertyDescriptor &&
      !!t(function () {
        Object.getOwnPropertyDescriptor("foo", "bar");
      })
    ) {
      var Ft = Object.getOwnPropertyDescriptor;
      te(Object, "getOwnPropertyDescriptor", function xo(e, t) {
        return Ft(ce.ToObject(e), t);
      });
    }
    if (
      Object.seal &&
      !!t(function () {
        Object.seal("foo");
      })
    ) {
      var qt = Object.seal;
      te(Object, "seal", function Ao(e) {
        return ce.TypeIsObject(e) ? qt(e) : e;
      });
    }
    if (
      Object.isSealed &&
      !!t(function () {
        Object.isSealed("foo");
      })
    ) {
      var Bt = Object.isSealed;
      te(Object, "isSealed", function So(e) {
        return !ce.TypeIsObject(e) || Bt(e);
      });
    }
    if (
      Object.freeze &&
      !!t(function () {
        Object.freeze("foo");
      })
    ) {
      var Wt = Object.freeze;
      te(Object, "freeze", function To(e) {
        return ce.TypeIsObject(e) ? Wt(e) : e;
      });
    }
    if (
      Object.isFrozen &&
      !!t(function () {
        Object.isFrozen("foo");
      })
    ) {
      var Ht = Object.isFrozen;
      te(Object, "isFrozen", function Co(e) {
        return !ce.TypeIsObject(e) || Ht(e);
      });
    }
    if (
      Object.preventExtensions &&
      !!t(function () {
        Object.preventExtensions("foo");
      })
    ) {
      var Ut = Object.preventExtensions;
      te(Object, "preventExtensions", function Oo(e) {
        return ce.TypeIsObject(e) ? Ut(e) : e;
      });
    }
    if (
      Object.isExtensible &&
      !!t(function () {
        Object.isExtensible("foo");
      })
    ) {
      var Jt = Object.isExtensible;
      te(Object, "isExtensible", function jo(e) {
        return !!ce.TypeIsObject(e) && Jt(e);
      });
    }
    if (
      Object.getPrototypeOf &&
      !!t(function () {
        Object.getPrototypeOf("foo");
      })
    ) {
      var Gt = Object.getPrototypeOf;
      te(Object, "getPrototypeOf", function Eo(e) {
        return Gt(ce.ToObject(e));
      });
    }
    var zt,
      Yt =
        s &&
        (zt = Object.getOwnPropertyDescriptor(RegExp.prototype, "flags")) &&
        ce.IsCallable(zt.get);
    if (s && !Yt) {
      var Vt = function Io() {
        if (!ce.TypeIsObject(this))
          throw new TypeError(
            "Method called on incompatible type: must be an object."
          );
        var e = "";
        return (
          this.global && (e += "g"),
          this.ignoreCase && (e += "i"),
          this.multiline && (e += "m"),
          this.unicode && (e += "u"),
          this.sticky && (e += "y"),
          e
        );
      };
      m.getter(RegExp.prototype, "flags", Vt);
    }
    var Xt,
      Zt =
        s &&
        a(function () {
          return "/a/i" === String(new RegExp(/a/g, "i"));
        }),
      Qt = ne && s && (((Xt = /./)[G.match] = !1), RegExp(Xt) === Xt),
      Kt = a(function () {
        return "/abc/" === RegExp.prototype.toString.call({ source: "abc" });
      }),
      $t =
        Kt &&
        a(function () {
          return (
            "/a/b" ===
            RegExp.prototype.toString.call({ source: "a", flags: "b" })
          );
        });
    if (!Kt || !$t) {
      var en = RegExp.prototype.toString;
      v(
        RegExp.prototype,
        "toString",
        function No() {
          var e = ce.RequireObjectCoercible(this);
          return ee.regex(e)
            ? M(en, e)
            : "/" + ae(e.source) + "/" + ae(e.flags);
        },
        !0
      ),
        m.preserveToString(RegExp.prototype.toString, en);
    }
    if (s && (!Zt || Qt)) {
      var tn = Object.getOwnPropertyDescriptor(RegExp.prototype, "flags").get,
        nn = Object.getOwnPropertyDescriptor(RegExp.prototype, "source") || {},
        rn = function () {
          return this.source;
        },
        on = ce.IsCallable(nn.get) ? nn.get : rn,
        an = RegExp,
        sn = function Po(e, t) {
          var n = ce.IsRegExp(e);
          if (
            !(this instanceof Po) &&
            n &&
            void 0 === t &&
            e.constructor === Po
          )
            return e;
          var r = e,
            o = t;
          return ee.regex(e)
            ? ((r = ce.Call(on, e)),
              (o = void 0 === t ? ce.Call(tn, e) : t),
              new Po(r, o))
            : (n && ((r = e.source), (o = void 0 === t ? e.flags : t)),
              new an(e, t));
        };
      Ce(an, sn, { $input: !0 }), (RegExp = sn), m.redefine(R, "RegExp", sn);
    }
    if (s) {
      var un = {
        input: "$_",
        lastMatch: "$&",
        lastParen: "$+",
        leftContext: "$`",
        rightContext: "$'",
      };
      y(g(un), function (e) {
        e in RegExp &&
          !(un[e] in RegExp) &&
          m.getter(RegExp, un[e], function t() {
            return RegExp[e];
          });
      });
    }
    je(RegExp);
    var cn = 1 / Number.EPSILON,
      ln = function ln(e) {
        return e + cn - cn;
      },
      fn = Math.pow(2, -23),
      pn = Math.pow(2, 127) * (2 - fn),
      hn = Math.pow(2, -126),
      dn = Math.E,
      gn = Math.LOG2E,
      yn = Math.LOG10E,
      vn = Number.prototype.clz;
    delete Number.prototype.clz;
    var mn = {
        acosh: function ko(e) {
          var t = Number(e);
          if (Y(t) || e < 1) return NaN;
          if (1 === t) return 0;
          if (t === Infinity) return t;
          var n = 1 / (t * t);
          if (t < 2) return Z(t - 1 + k(1 - n) * t);
          var r = t / 2;
          return Z(r + k(1 - n) * r - 1) + 1 / gn;
        },
        asinh: function Do(e) {
          var t = Number(e);
          if (0 === t || !w(t)) return t;
          var n = I(t),
            r = n * n,
            o = X(t);
          return n < 1
            ? o * Z(n + r / (k(r + 1) + 1))
            : o * (Z(n / 2 + (k(1 + 1 / r) * n) / 2 - 1) + 1 / gn);
        },
        atanh: function Mo(e) {
          var t = Number(e);
          if (0 === t) return t;
          if (-1 === t) return -Infinity;
          if (1 === t) return Infinity;
          if (Y(t) || t < -1 || 1 < t) return NaN;
          var n = I(t);
          return (X(t) * Z((2 * n) / (1 - n))) / 2;
        },
        cbrt: function Lo(e) {
          var t = Number(e);
          if (0 === t) return t;
          var n,
            r = t < 0;
          return (
            r && (t = -t),
            (n =
              t === Infinity
                ? Infinity
                : (t / ((n = N(P(t) / 3)) * n) + 2 * n) / 3),
            r ? -n : n
          );
        },
        clz32: function Ro(e) {
          var t = Number(e),
            n = ce.ToUint32(t);
          return 0 === n ? 32 : vn ? ce.Call(vn, n) : 31 - E(P(n + 0.5) * gn);
        },
        cosh: function _o(e) {
          var t = Number(e);
          if (0 === t) return 1;
          if (Y(t)) return NaN;
          if (!w(t)) return Infinity;
          var n = N(I(t) - 1);
          return (n + 1 / (n * dn * dn)) * (dn / 2);
        },
        expm1: function Fo(e) {
          var t = Number(e);
          if (t === -Infinity) return -1;
          if (!w(t) || 0 === t) return t;
          if (0.5 < I(t)) return N(t) - 1;
          for (var n = t, r = 0, o = 1; r + n !== r; )
            (r += n), (n *= t / (o += 1));
          return r;
        },
        hypot: function qo() {
          for (var e = 0, t = 0, n = 0; n < arguments.length; ++n) {
            var r = I(Number(arguments[n]));
            t < r
              ? ((e *= (t / r) * (t / r)), (e += 1), (t = r))
              : (e += 0 < r ? (r / t) * (r / t) : r);
          }
          return t === Infinity ? Infinity : t * k(e);
        },
        log2: function Bo(e) {
          return P(e) * gn;
        },
        log10: function Wo(e) {
          return P(e) * yn;
        },
        log1p: Z,
        sign: X,
        sinh: function Ho(e) {
          var t = Number(e);
          if (!w(t) || 0 === t) return t;
          var n = I(t);
          if (n < 1) {
            var r = Math.expm1(n);
            return (X(t) * r * (1 + 1 / (r + 1))) / 2;
          }
          var o = N(n - 1);
          return X(t) * (o - 1 / (o * dn * dn)) * (dn / 2);
        },
        tanh: function Uo(e) {
          var t = Number(e);
          return Y(t) || 0 === t
            ? t
            : 20 <= t
            ? 1
            : t <= -20
            ? -1
            : (Math.expm1(t) - Math.expm1(-t)) / (N(t) + N(-t));
        },
        trunc: function Jo(e) {
          var t = Number(e);
          return t < 0 ? -E(-t) : E(t);
        },
        imul: function Go(e, t) {
          var n = ce.ToUint32(e),
            r = ce.ToUint32(t),
            o = 65535 & n,
            i = 65535 & r;
          return (
            (o * i +
              (((((n >>> 16) & 65535) * i + o * ((r >>> 16) & 65535)) << 16) >>>
                0)) |
            0
          );
        },
        fround: function zo(e) {
          var t = Number(e);
          if (0 === t || t === Infinity || t === -Infinity || Y(t)) return t;
          var n = X(t),
            r = I(t);
          if (r < hn) return n * ln(r / hn / fn) * hn * fn;
          var o = (1 + fn / Number.EPSILON) * r,
            i = o - (o - r);
          return pn < i || Y(i) ? n * Infinity : n * i;
        },
      },
      bn = function bn(e, t, n) {
        return I(1 - e / t) / Number.EPSILON < (n || 8);
      };
    L(Math, mn),
      v(Math, "sinh", mn.sinh, Math.sinh(710) === Infinity),
      v(Math, "cosh", mn.cosh, Math.cosh(710) === Infinity),
      v(Math, "log1p", mn.log1p, -1e-17 !== Math.log1p(-1e-17)),
      v(Math, "asinh", mn.asinh, Math.asinh(-1e7) !== -Math.asinh(1e7)),
      v(Math, "asinh", mn.asinh, Math.asinh(1e300) === Infinity),
      v(Math, "atanh", mn.atanh, 0 === Math.atanh(1e-300)),
      v(Math, "tanh", mn.tanh, -2e-17 !== Math.tanh(-2e-17)),
      v(Math, "acosh", mn.acosh, Math.acosh(Number.MAX_VALUE) === Infinity),
      v(
        Math,
        "acosh",
        mn.acosh,
        !bn(Math.acosh(1 + Number.EPSILON), Math.sqrt(2 * Number.EPSILON))
      ),
      v(Math, "cbrt", mn.cbrt, !bn(Math.cbrt(1e-300), 1e-100)),
      v(Math, "sinh", mn.sinh, -2e-17 !== Math.sinh(-2e-17));
    var wn = Math.expm1(10);
    v(
      Math,
      "expm1",
      mn.expm1,
      22025.465794806718 < wn || wn < 22025.465794806718
    );
    var xn = Math.round,
      An =
        0 === Math.round(0.5 - Number.EPSILON / 4) &&
        1 === Math.round(Number.EPSILON / 3.99 - 0.5),
      Sn = [cn + 1, 2 * cn - 1].every(function (e) {
        return Math.round(e) === e;
      });
    v(
      Math,
      "round",
      function Yo(e) {
        var t = E(e);
        return e - t < 0.5 ? t : -1 === t ? -0 : t + 1;
      },
      !An || !Sn
    ),
      m.preserveToString(Math.round, xn);
    var Tn = Math.imul;
    -5 !== Math.imul(4294967295, 5) &&
      ((Math.imul = mn.imul), m.preserveToString(Math.imul, Tn)),
      2 !== Math.imul.length &&
        te(Math, "imul", function Go() {
          return ce.Call(Tn, Math, arguments);
        });
    var Cn,
      On,
      jn = (function () {
        var t = R.setTimeout;
        if ("function" == typeof t || "object" == typeof t) {
          ce.IsPromise = function (e) {
            return !!ce.TypeIsObject(e) && "undefined" != typeof e._promise;
          };
          var e,
            f = function (e) {
              if (!ce.IsConstructor(e))
                throw new TypeError("Bad promise constructor");
              var n = this,
                t = function (e, t) {
                  if (void 0 !== n.resolve || void 0 !== n.reject)
                    throw new TypeError("Bad Promise implementation!");
                  (n.resolve = e), (n.reject = t);
                };
              if (
                ((n.resolve = void 0),
                (n.reject = void 0),
                (n.promise = new e(t)),
                !ce.IsCallable(n.resolve) || !ce.IsCallable(n.reject))
              )
                throw new TypeError("Bad promise constructor");
            };
          "undefined" != typeof window &&
            ce.IsCallable(window.postMessage) &&
            (e = function () {
              var t = [],
                n = "zero-timeout-message",
                e = function (e) {
                  _(t, e), window.postMessage(n, "*");
                },
                r = function (e) {
                  if (e.source === window && e.data === n) {
                    if ((e.stopPropagation(), 0 === t.length)) return;
                    F(t)();
                  }
                };
              return window.addEventListener("message", r, !0), e;
            });
          var i,
            o,
            a,
            n = function () {
              var e = R.Promise,
                t = e && e.resolve && e.resolve();
              return (
                t &&
                function (e) {
                  return t.then(e);
                }
              );
            },
            s = ce.IsCallable(R.setImmediate)
              ? R.setImmediate
              : "object" == typeof process && process.nextTick
              ? process.nextTick
              : n() ||
                (ce.IsCallable(e)
                  ? e()
                  : function (e) {
                      t(e, 0);
                    }),
            p = function (e) {
              return e;
            },
            h = function (e) {
              throw e;
            },
            d = 0,
            g = 1,
            y = 2,
            v = 0,
            m = 1,
            b = 2,
            w = {},
            x = function (e, t, n) {
              s(function () {
                r(e, t, n);
              });
            },
            r = function (e, t, n) {
              var r, o;
              if (t === w) return e(n);
              try {
                (r = e(n)), (o = t.resolve);
              } catch (i) {
                (r = i), (o = t.reject);
              }
              o(r);
            },
            u = function (e, t) {
              var n = e._promise,
                r = n.reactionLength;
              if (
                0 < r &&
                (x(n.fulfillReactionHandler0, n.reactionCapability0, t),
                (n.fulfillReactionHandler0 = void 0),
                (n.rejectReactions0 = void 0),
                (n.reactionCapability0 = void 0),
                1 < r)
              )
                for (var o = 1, i = 0; o < r; o++, i += 3)
                  x(n[i + v], n[i + b], t),
                    (e[i + v] = void 0),
                    (e[i + m] = void 0),
                    (e[i + b] = void 0);
              (n.result = t), (n.state = g), (n.reactionLength = 0);
            },
            c = function (e, t) {
              var n = e._promise,
                r = n.reactionLength;
              if (
                0 < r &&
                (x(n.rejectReactionHandler0, n.reactionCapability0, t),
                (n.fulfillReactionHandler0 = void 0),
                (n.rejectReactions0 = void 0),
                (n.reactionCapability0 = void 0),
                1 < r)
              )
                for (var o = 1, i = 0; o < r; o++, i += 3)
                  x(n[i + m], n[i + b], t),
                    (e[i + v] = void 0),
                    (e[i + m] = void 0),
                    (e[i + b] = void 0);
              (n.result = t), (n.state = y), (n.reactionLength = 0);
            },
            l = function (r) {
              var o = !1;
              return {
                resolve: function (e) {
                  var t;
                  if (!o) {
                    if (((o = !0), e === r))
                      return c(r, new TypeError("Self resolution"));
                    if (!ce.TypeIsObject(e)) return u(r, e);
                    try {
                      t = e.then;
                    } catch (n) {
                      return c(r, n);
                    }
                    if (!ce.IsCallable(t)) return u(r, e);
                    s(function () {
                      S(r, e, t);
                    });
                  }
                },
                reject: function (e) {
                  if (!o) return (o = !0), c(r, e);
                },
              };
            },
            A = function (e, t, n, r) {
              e === o ? M(e, t, n, r, w) : M(e, t, n, r);
            },
            S = function (e, t, n) {
              var r = l(e),
                o = r.resolve,
                i = r.reject;
              try {
                A(n, t, o, i);
              } catch (a) {
                i(a);
              }
            },
            T = (a = function E(e) {
              if (!(this instanceof a))
                throw new TypeError('Constructor Promise requires "new"');
              if (this && this._promise)
                throw new TypeError("Bad construction");
              if (!ce.IsCallable(e))
                throw new TypeError("not a valid resolver");
              var t = Pe(this, a, i, {
                  _promise: {
                    result: void 0,
                    state: d,
                    reactionLength: 0,
                    fulfillReactionHandler0: void 0,
                    rejectReactionHandler0: void 0,
                    reactionCapability0: void 0,
                  },
                }),
                n = l(t),
                r = n.reject;
              try {
                e(n.resolve, r);
              } catch (o) {
                r(o);
              }
              return t;
            });
          i = T.prototype;
          var C = function (t, n, r, o) {
              var i = !1;
              return function (e) {
                i ||
                  ((i = !0), (n[t] = e), 0 == --o.count && (0, r.resolve)(n));
              };
            },
            O = function (e, t, n) {
              for (
                var r, o, i = e.iterator, a = [], s = { count: 1 }, u = 0;
                ;

              ) {
                try {
                  if (!1 === (r = ce.IteratorStep(i))) {
                    e.done = !0;
                    break;
                  }
                  o = r.value;
                } catch (f) {
                  throw ((e.done = !0), f);
                }
                a[u] = void 0;
                var c = t.resolve(o),
                  l = C(u, a, n, s);
                (s.count += 1), A(c.then, c, l, n.reject), (u += 1);
              }
              0 == --s.count && (0, n.resolve)(a);
              return n.promise;
            },
            j = function (e, t, n) {
              for (var r, o, i, a = e.iterator; ; ) {
                try {
                  if (!1 === (r = ce.IteratorStep(a))) {
                    e.done = !0;
                    break;
                  }
                  o = r.value;
                } catch (s) {
                  throw ((e.done = !0), s);
                }
                (i = t.resolve(o)), A(i.then, i, n.resolve, n.reject);
              }
              return n.promise;
            };
          return (
            L(T, {
              all: function I(e) {
                var t = this;
                if (!ce.TypeIsObject(t))
                  throw new TypeError("Promise is not object");
                var n,
                  r,
                  o = new f(t);
                try {
                  return (
                    (n = ce.GetIterator(e)),
                    O((r = { iterator: n, done: !1 }), t, o)
                  );
                } catch (s) {
                  var i = s;
                  if (r && !r.done)
                    try {
                      ce.IteratorClose(n, !0);
                    } catch (u) {
                      i = u;
                    }
                  var a = o.reject;
                  return a(i), o.promise;
                }
              },
              race: function N(e) {
                var t = this;
                if (!ce.TypeIsObject(t))
                  throw new TypeError("Promise is not object");
                var n,
                  r,
                  o = new f(t);
                try {
                  return (
                    (n = ce.GetIterator(e)),
                    j((r = { iterator: n, done: !1 }), t, o)
                  );
                } catch (s) {
                  var i = s;
                  if (r && !r.done)
                    try {
                      ce.IteratorClose(n, !0);
                    } catch (u) {
                      i = u;
                    }
                  var a = o.reject;
                  return a(i), o.promise;
                }
              },
              reject: function P(e) {
                var t = this;
                if (!ce.TypeIsObject(t))
                  throw new TypeError("Bad promise constructor");
                var n = new f(t);
                return (0, n.reject)(e), n.promise;
              },
              resolve: function k(e) {
                var t = this;
                if (!ce.TypeIsObject(t))
                  throw new TypeError("Bad promise constructor");
                if (ce.IsPromise(e) && e.constructor === t) return e;
                var n = new f(t);
                return (0, n.resolve)(e), n.promise;
              },
            }),
            L(i, {
              catch: function (e) {
                return this.then(null, e);
              },
              then: function D(e, t, n) {
                var r = this;
                if (!ce.IsPromise(r)) throw new TypeError("not a promise");
                var o,
                  i = ce.SpeciesConstructor(r, T);
                o = 2 < arguments.length && n === w && i === T ? w : new f(i);
                var a,
                  s = ce.IsCallable(e) ? e : p,
                  u = ce.IsCallable(t) ? t : h,
                  c = r._promise;
                if (c.state === d) {
                  if (0 === c.reactionLength)
                    (c.fulfillReactionHandler0 = s),
                      (c.rejectReactionHandler0 = u),
                      (c.reactionCapability0 = o);
                  else {
                    var l = 3 * (c.reactionLength - 1);
                    (c[l + v] = s), (c[l + m] = u), (c[l + b] = o);
                  }
                  c.reactionLength += 1;
                } else if (c.state === g) (a = c.result), x(s, o, a);
                else {
                  if (c.state !== y)
                    throw new TypeError("unexpected Promise state");
                  (a = c.result), x(u, o, a);
                }
                return o.promise;
              },
            }),
            (w = new f(T)),
            (o = i.then),
            T
          );
        }
      })();
    if (
      (R.Promise &&
        (delete R.Promise.accept,
        delete R.Promise.defer,
        delete R.Promise.prototype.chain),
      "function" == typeof jn)
    ) {
      L(R, { Promise: jn });
      var En = b(R.Promise, function (e) {
          return e.resolve(42).then(function () {}) instanceof e;
        }),
        In = !t(function () {
          R.Promise.reject(42).then(null, 5).then(null, q);
        }),
        Nn = t(function () {
          R.Promise.call(3, q);
        }),
        Pn = (function (e) {
          var t = e.resolve(5);
          t.constructor = {};
          var n = e.resolve(t);
          try {
            n.then(null, q).then(null, q);
          } catch (r) {
            return !0;
          }
          return t === n;
        })(R.Promise),
        kn =
          s &&
          ((Cn = 0),
          (On = Object.defineProperty({}, "then", {
            get: function () {
              Cn += 1;
            },
          })),
          Promise.resolve(On),
          1 === Cn),
        Dn = function Dn(e) {
          var t = new Promise(e);
          e(3, function () {}), (this.then = t.then), (this.constructor = Dn);
        };
      (Dn.prototype = Promise.prototype), (Dn.all = Promise.all);
      var Mn = a(function () {
        return !!Dn.all([1, 2]);
      });
      if (
        ((En && In && Nn && !Pn && kn && !Mn) ||
          ((Promise = jn), te(R, "Promise", jn)),
        1 !== Promise.all.length)
      ) {
        var Ln = Promise.all;
        te(Promise, "all", function Vo() {
          return ce.Call(Ln, this, arguments);
        });
      }
      if (1 !== Promise.race.length) {
        var Rn = Promise.race;
        te(Promise, "race", function Xo() {
          return ce.Call(Rn, this, arguments);
        });
      }
      if (1 !== Promise.resolve.length) {
        var _n = Promise.resolve;
        te(Promise, "resolve", function Zo() {
          return ce.Call(_n, this, arguments);
        });
      }
      if (1 !== Promise.reject.length) {
        var Fn = Promise.reject;
        te(Promise, "reject", function Qo() {
          return ce.Call(Fn, this, arguments);
        });
      }
      Et(Promise, "all"),
        Et(Promise, "race"),
        Et(Promise, "resolve"),
        Et(Promise, "reject"),
        je(Promise);
    }
    var qn,
      Bn,
      Wn = function (e) {
        var t = g(
          c(
            e,
            function (e, t) {
              return (e[t] = !0), e;
            },
            {}
          )
        );
        return e.join(":") === t.join(":");
      },
      Hn = Wn(["z", "a", "bb"]),
      Un = Wn(["z", 1, "a", "3", 2]);
    if (s) {
      var Jn = function Jn(e, t) {
          return t || Hn
            ? ue(e)
              ? "^" + ce.ToString(e)
              : "string" == typeof e
              ? "$" + e
              : "number" == typeof e
              ? Un
                ? e
                : "n" + e
              : "boolean" == typeof e
              ? "b" + e
              : null
            : null;
        },
        Gn = function Gn() {
          return Object.create ? Object.create(null) : {};
        },
        zn = function zn(e, n, t) {
          if (u(t) || ee.string(t))
            y(t, function (e) {
              if (!ce.TypeIsObject(e))
                throw new TypeError(
                  "Iterator value " + e + " is not an entry object"
                );
              n.set(e[0], e[1]);
            });
          else if (t instanceof e)
            M(e.prototype.forEach, t, function (e, t) {
              n.set(t, e);
            });
          else {
            var r, o;
            if (!ue(t)) {
              if (((o = n.set), !ce.IsCallable(o)))
                throw new TypeError("bad map");
              r = ce.GetIterator(t);
            }
            if (void 0 !== r)
              for (;;) {
                var i = ce.IteratorStep(r);
                if (!1 === i) break;
                var a = i.value;
                try {
                  if (!ce.TypeIsObject(a))
                    throw new TypeError(
                      "Iterator value " + a + " is not an entry object"
                    );
                  M(o, n, a[0], a[1]);
                } catch (s) {
                  throw (ce.IteratorClose(r, !0), s);
                }
              }
          }
        },
        Yn = function Yn(e, t, n) {
          if (u(n) || ee.string(n))
            y(n, function (e) {
              t.add(e);
            });
          else if (n instanceof e)
            M(e.prototype.forEach, n, function (e) {
              t.add(e);
            });
          else {
            var r, o;
            if (!ue(n)) {
              if (((o = t.add), !ce.IsCallable(o)))
                throw new TypeError("bad set");
              r = ce.GetIterator(n);
            }
            if (void 0 !== r)
              for (;;) {
                var i = ce.IteratorStep(r);
                if (!1 === i) break;
                var a = i.value;
                try {
                  M(o, t, a);
                } catch (s) {
                  throw (ce.IteratorClose(r, !0), s);
                }
              }
          }
        },
        Vn = {
          Map: (function () {
            var o = {},
              a = function a(e, t) {
                (this.key = e),
                  (this.value = t),
                  (this.next = null),
                  (this.prev = null);
              };
            a.prototype.isRemoved = function t() {
              return this.key === o;
            };
            var r,
              n = function n(e) {
                return !!e._es6map;
              },
              s = function s(e, t) {
                if (!ce.TypeIsObject(e) || !n(e))
                  throw new TypeError(
                    "Method Map.prototype." +
                      t +
                      " called on incompatible receiver " +
                      ce.ToString(e)
                  );
              },
              i = function i(e, t) {
                s(e, "[[MapIterator]]"),
                  (this.head = e._head),
                  (this.i = this.head),
                  (this.kind = t);
              };
            (i.prototype = {
              isMapIterator: !0,
              next: function u() {
                if (!this.isMapIterator)
                  throw new TypeError("Not a MapIterator");
                var e,
                  t = this.i,
                  n = this.kind,
                  r = this.head;
                if ("undefined" == typeof this.i) return ze();
                for (; t.isRemoved() && t !== r; ) t = t.prev;
                for (; t.next !== r; )
                  if (!(t = t.next).isRemoved())
                    return (
                      (e =
                        "key" === n
                          ? t.key
                          : "value" === n
                          ? t.value
                          : [t.key, t.value]),
                      (this.i = t),
                      ze(e)
                    );
                return (this.i = void 0), ze();
              },
            }),
              Ee(i.prototype);
            var e = function c(e) {
              if (!(this instanceof c))
                throw new TypeError('Constructor Map requires "new"');
              if (this && this._es6map) throw new TypeError("Bad construction");
              var t = Pe(this, c, r, {
                  _es6map: !0,
                  _head: null,
                  _map: B ? new B() : null,
                  _size: 0,
                  _storage: Gn(),
                }),
                n = new a(null, null);
              return (
                (n.next = n.prev = n),
                (t._head = n),
                0 < arguments.length && zn(c, t, e),
                t
              );
            };
            return (
              (r = e.prototype),
              m.getter(r, "size", function () {
                if ("undefined" == typeof this._size)
                  throw new TypeError("size method called on incompatible Map");
                return this._size;
              }),
              L(r, {
                get: function l(e) {
                  var t;
                  s(this, "get");
                  var n = Jn(e, !0);
                  if (null !== n)
                    return (t = this._storage[n]) ? t.value : void 0;
                  if (this._map)
                    return (t = H.call(this._map, e)) ? t.value : void 0;
                  for (var r = this._head, o = r; (o = o.next) !== r; )
                    if (ce.SameValueZero(o.key, e)) return o.value;
                },
                has: function f(e) {
                  s(this, "has");
                  var t = Jn(e, !0);
                  if (null !== t) return "undefined" != typeof this._storage[t];
                  if (this._map) return U.call(this._map, e);
                  for (var n = this._head, r = n; (r = r.next) !== n; )
                    if (ce.SameValueZero(r.key, e)) return !0;
                  return !1;
                },
                set: function p(e, t) {
                  s(this, "set");
                  var n,
                    r = this._head,
                    o = r,
                    i = Jn(e, !0);
                  if (null !== i) {
                    if ("undefined" != typeof this._storage[i])
                      return (this._storage[i].value = t), this;
                    (n = this._storage[i] = new a(e, t)), (o = r.prev);
                  } else
                    this._map &&
                      (U.call(this._map, e)
                        ? (H.call(this._map, e).value = t)
                        : ((n = new a(e, t)),
                          J.call(this._map, e, n),
                          (o = r.prev)));
                  for (; (o = o.next) !== r; )
                    if (ce.SameValueZero(o.key, e)) return (o.value = t), this;
                  return (
                    (n = n || new a(e, t)),
                    ce.SameValue(-0, e) && (n.key = 0),
                    (n.next = this._head),
                    (n.prev = this._head.prev),
                    ((n.prev.next = n).next.prev = n),
                    (this._size += 1),
                    this
                  );
                },
                delete: function (e) {
                  s(this, "delete");
                  var t = this._head,
                    n = t,
                    r = Jn(e, !0);
                  if (null !== r) {
                    if ("undefined" == typeof this._storage[r]) return !1;
                    (n = this._storage[r].prev), delete this._storage[r];
                  } else if (this._map) {
                    if (!U.call(this._map, e)) return !1;
                    (n = H.call(this._map, e).prev), W.call(this._map, e);
                  }
                  for (; (n = n.next) !== t; )
                    if (ce.SameValueZero(n.key, e))
                      return (
                        (n.key = o),
                        (n.value = o),
                        (n.prev.next = n.next),
                        (n.next.prev = n.prev),
                        (this._size -= 1),
                        !0
                      );
                  return !1;
                },
                clear: function h() {
                  s(this, "clear"),
                    (this._map = B ? new B() : null),
                    (this._size = 0),
                    (this._storage = Gn());
                  for (var e = this._head, t = e, n = t.next; (t = n) !== e; )
                    (t.key = o),
                      (t.value = o),
                      (n = t.next),
                      (t.next = t.prev = e);
                  e.next = e.prev = e;
                },
                keys: function d() {
                  return s(this, "keys"), new i(this, "key");
                },
                values: function g() {
                  return s(this, "values"), new i(this, "value");
                },
                entries: function y() {
                  return s(this, "entries"), new i(this, "key+value");
                },
                forEach: function v(e, t) {
                  s(this, "forEach");
                  for (
                    var n = 1 < arguments.length ? t : null,
                      r = this.entries(),
                      o = r.next();
                    !o.done;
                    o = r.next()
                  )
                    n
                      ? M(e, n, o.value[1], o.value[0], this)
                      : e(o.value[1], o.value[0], this);
                },
              }),
              Ee(r, r.entries),
              e
            );
          })(),
          Set: (function () {
            var n,
              r = function r(e) {
                return e._es6set && "undefined" != typeof e._storage;
              },
              i = function i(e, t) {
                if (!ce.TypeIsObject(e) || !r(e))
                  throw new TypeError(
                    "Set.prototype." +
                      t +
                      " called on incompatible receiver " +
                      ce.ToString(e)
                  );
              },
              e = function s(e) {
                if (!(this instanceof s))
                  throw new TypeError('Constructor Set requires "new"');
                if (this && this._es6set)
                  throw new TypeError("Bad construction");
                var t = Pe(this, s, n, {
                  _es6set: !0,
                  "[[SetData]]": null,
                  _storage: Gn(),
                });
                if (!t._es6set) throw new TypeError("bad set");
                return 0 < arguments.length && Yn(s, t, e), t;
              };
            n = e.prototype;
            var o = function (e) {
                var t = e;
                if ("^null" === t) return null;
                if ("^undefined" !== t) {
                  var n = t.charAt(0);
                  return "$" === n
                    ? T(t, 1)
                    : "n" === n
                    ? +T(t, 1)
                    : "b" === n
                    ? "btrue" === t
                    : +t;
                }
              },
              a = function a(e) {
                if (!e["[[SetData]]"]) {
                  var n = new Vn.Map();
                  (e["[[SetData]]"] = n),
                    y(g(e._storage), function (e) {
                      var t = o(e);
                      n.set(t, t);
                    }),
                    (e["[[SetData]]"] = n);
                }
                e._storage = null;
              };
            m.getter(e.prototype, "size", function () {
              return (
                i(this, "size"),
                this._storage
                  ? g(this._storage).length
                  : (a(this), this["[[SetData]]"].size)
              );
            }),
              L(e.prototype, {
                has: function u(e) {
                  var t;
                  return (
                    i(this, "has"),
                    this._storage && null !== (t = Jn(e))
                      ? !!this._storage[t]
                      : (a(this), this["[[SetData]]"].has(e))
                  );
                },
                add: function c(e) {
                  var t;
                  return (
                    i(this, "add"),
                    this._storage && null !== (t = Jn(e))
                      ? (this._storage[t] = !0)
                      : (a(this), this["[[SetData]]"].set(e, e)),
                    this
                  );
                },
                delete: function (e) {
                  var t;
                  if (
                    (i(this, "delete"), this._storage && null !== (t = Jn(e)))
                  ) {
                    var n = D(this._storage, t);
                    return delete this._storage[t] && n;
                  }
                  return a(this), this["[[SetData]]"]["delete"](e);
                },
                clear: function l() {
                  i(this, "clear"),
                    this._storage && (this._storage = Gn()),
                    this["[[SetData]]"] && this["[[SetData]]"].clear();
                },
                values: function f() {
                  return (
                    i(this, "values"),
                    a(this),
                    new t(this["[[SetData]]"].values())
                  );
                },
                entries: function p() {
                  return (
                    i(this, "entries"),
                    a(this),
                    new t(this["[[SetData]]"].entries())
                  );
                },
                forEach: function h(n, e) {
                  i(this, "forEach");
                  var r = 1 < arguments.length ? e : null,
                    o = this;
                  a(o),
                    this["[[SetData]]"].forEach(function (e, t) {
                      r ? M(n, r, t, t, o) : n(t, t, o);
                    });
                },
              }),
              v(e.prototype, "keys", e.prototype.values, !0),
              Ee(e.prototype, e.prototype.values);
            var t = function t(e) {
              this.it = e;
            };
            return (
              (t.prototype = {
                isSetIterator: !0,
                next: function d() {
                  if (!this.isSetIterator)
                    throw new TypeError("Not a SetIterator");
                  return this.it.next();
                },
              }),
              Ee(t.prototype),
              e
            );
          })(),
        };
      if (
        (R.Set &&
          !Set.prototype["delete"] &&
          Set.prototype.remove &&
          Set.prototype.items &&
          Set.prototype.map &&
          Array.isArray(new Set().keys) &&
          (R.Set = Vn.Set),
        R.Map || R.Set)
      ) {
        a(function () {
          return 2 === new Map([[1, 2]]).get(1);
        }) ||
          ((R.Map = function Ko(e) {
            if (!(this instanceof Ko))
              throw new TypeError('Constructor Map requires "new"');
            var t = new B();
            return (
              0 < arguments.length && zn(Ko, t, e),
              delete t.constructor,
              Object.setPrototypeOf(t, R.Map.prototype),
              t
            );
          }),
          (R.Map.prototype = d(B.prototype)),
          v(R.Map.prototype, "constructor", R.Map, !0),
          m.preserveToString(R.Map, B));
        var Xn = new Map(),
          Zn =
            ((Bn = new Map([
              [1, 0],
              [2, 0],
              [3, 0],
              [4, 0],
            ])).set(-0, Bn),
            Bn.get(0) === Bn && Bn.get(-0) === Bn && Bn.has(0) && Bn.has(-0)),
          Qn = Xn.set(1, 2) === Xn;
        (Zn && Qn) ||
          te(Map.prototype, "set", function $o(e, t) {
            return M(J, this, 0 === e ? 0 : e, t), this;
          }),
          Zn ||
            (L(
              Map.prototype,
              {
                get: function ei(e) {
                  return M(H, this, 0 === e ? 0 : e);
                },
                has: function ti(e) {
                  return M(U, this, 0 === e ? 0 : e);
                },
              },
              !0
            ),
            m.preserveToString(Map.prototype.get, H),
            m.preserveToString(Map.prototype.has, U));
        var Kn = new Set(),
          $n =
            Set.prototype["delete"] &&
            Set.prototype.add &&
            Set.prototype.has &&
            ((qn = Kn)["delete"](0), qn.add(-0), !qn.has(0)),
          er = Kn.add(1) === Kn;
        if (!$n || !er) {
          var tr = Set.prototype.add;
          (Set.prototype.add = function ni(e) {
            return M(tr, this, 0 === e ? 0 : e), this;
          }),
            m.preserveToString(Set.prototype.add, tr);
        }
        if (!$n) {
          var nr = Set.prototype.has;
          (Set.prototype.has = function ti(e) {
            return M(nr, this, 0 === e ? 0 : e);
          }),
            m.preserveToString(Set.prototype.has, nr);
          var rr = Set.prototype["delete"];
          (Set.prototype["delete"] = function ri(e) {
            return M(rr, this, 0 === e ? 0 : e);
          }),
            m.preserveToString(Set.prototype["delete"], rr);
        }
        var or = b(R.Map, function (e) {
            var t = new e([]);
            return t.set(42, 42), t instanceof e;
          }),
          ir = Object.setPrototypeOf && !or,
          ar = (function () {
            try {
              return !(R.Map() instanceof R.Map);
            } catch (e) {
              return e instanceof TypeError;
            }
          })();
        (0 === R.Map.length && !ir && ar) ||
          ((R.Map = function oi(e) {
            if (!(this instanceof oi))
              throw new TypeError('Constructor Map requires "new"');
            var t = new B();
            return (
              0 < arguments.length && zn(oi, t, e),
              delete t.constructor,
              Object.setPrototypeOf(t, oi.prototype),
              t
            );
          }),
          (R.Map.prototype = B.prototype),
          v(R.Map.prototype, "constructor", R.Map, !0),
          m.preserveToString(R.Map, B));
        var sr = b(R.Set, function (e) {
            var t = new e([]);
            return t.add(42, 42), t instanceof e;
          }),
          ur = Object.setPrototypeOf && !sr,
          cr = (function () {
            try {
              return !(R.Set() instanceof R.Set);
            } catch (e) {
              return e instanceof TypeError;
            }
          })();
        if (0 !== R.Set.length || ur || !cr) {
          var lr = R.Set;
          (R.Set = function ii(e) {
            if (!(this instanceof ii))
              throw new TypeError('Constructor Set requires "new"');
            var t = new lr();
            return (
              0 < arguments.length && Yn(ii, t, e),
              delete t.constructor,
              Object.setPrototypeOf(t, ii.prototype),
              t
            );
          }),
            (R.Set.prototype = lr.prototype),
            v(R.Set.prototype, "constructor", R.Set, !0),
            m.preserveToString(R.Set, lr);
        }
        var fr = new R.Map(),
          pr = !a(function () {
            return fr.keys().next().done;
          });
        if (
          (("function" != typeof R.Map.prototype.clear ||
            0 !== new R.Set().size ||
            0 !== fr.size ||
            "function" != typeof R.Map.prototype.keys ||
            "function" != typeof R.Set.prototype.keys ||
            "function" != typeof R.Map.prototype.forEach ||
            "function" != typeof R.Set.prototype.forEach ||
            e(R.Map) ||
            e(R.Set) ||
            "function" != typeof fr.keys().next ||
            pr ||
            !or) &&
            L(R, { Map: Vn.Map, Set: Vn.Set }, !0),
          R.Set.prototype.keys !== R.Set.prototype.values &&
            v(R.Set.prototype, "keys", R.Set.prototype.values, !0),
          Ee(Object.getPrototypeOf(new R.Map().keys())),
          Ee(Object.getPrototypeOf(new R.Set().keys())),
          r && "has" !== R.Set.prototype.has.name)
        ) {
          var hr = R.Set.prototype.has;
          te(R.Set.prototype, "has", function ti(e) {
            return M(hr, this, e);
          });
        }
      }
      L(R, Vn), je(R.Map), je(R.Set);
    }
    var dr = function dr(e) {
        if (!ce.TypeIsObject(e))
          throw new TypeError("target must be an object");
      },
      gr = {
        apply: function ai() {
          return ce.Call(ce.Call, null, arguments);
        },
        construct: function si(e, t, n) {
          if (!ce.IsConstructor(e))
            throw new TypeError("First argument must be a constructor.");
          var r = 2 < arguments.length ? n : e;
          if (!ce.IsConstructor(r))
            throw new TypeError("new.target must be a constructor.");
          return ce.Construct(e, t, r, "internal");
        },
        deleteProperty: function ui(e, t) {
          if ((dr(e), s)) {
            var n = Object.getOwnPropertyDescriptor(e, t);
            if (n && !n.configurable) return !1;
          }
          return delete e[t];
        },
        has: function ti(e, t) {
          return dr(e), t in e;
        },
      };
    Object.getOwnPropertyNames &&
      Object.assign(gr, {
        ownKeys: function ci(e) {
          dr(e);
          var t = Object.getOwnPropertyNames(e);
          return (
            ce.IsCallable(Object.getOwnPropertySymbols) &&
              C(t, Object.getOwnPropertySymbols(e)),
            t
          );
        },
      });
    var yr = function li(e) {
      return !t(e);
    };
    if (
      (Object.preventExtensions &&
        Object.assign(gr, {
          isExtensible: function jo(e) {
            return dr(e), Object.isExtensible(e);
          },
          preventExtensions: function Oo(e) {
            return (
              dr(e),
              yr(function () {
                Object.preventExtensions(e);
              })
            );
          },
        }),
      s)
    ) {
      var vr = function ei(e, t, n) {
          var r = Object.getOwnPropertyDescriptor(e, t);
          if (r)
            return "value" in r ? r.value : r.get ? ce.Call(r.get, n) : void 0;
          var o = Object.getPrototypeOf(e);
          return null !== o ? vr(o, t, n) : void 0;
        },
        mr = function $o(e, t, n, r) {
          var o = Object.getOwnPropertyDescriptor(e, t);
          if (!o) {
            var i = Object.getPrototypeOf(e);
            if (null !== i) return mr(i, t, n, r);
            o = {
              value: void 0,
              writable: !0,
              enumerable: !0,
              configurable: !0,
            };
          }
          return "value" in o
            ? !!o.writable &&
                !!ce.TypeIsObject(r) &&
                (Object.getOwnPropertyDescriptor(r, t)
                  ? ie.defineProperty(r, t, { value: n })
                  : ie.defineProperty(r, t, {
                      value: n,
                      writable: !0,
                      enumerable: !0,
                      configurable: !0,
                    }))
            : !!o.set && (M(o.set, r, n), !0);
        };
      Object.assign(gr, {
        defineProperty: function v(e, t, n) {
          return (
            dr(e),
            yr(function () {
              Object.defineProperty(e, t, n);
            })
          );
        },
        getOwnPropertyDescriptor: function xo(e, t) {
          return dr(e), Object.getOwnPropertyDescriptor(e, t);
        },
        get: function ei(e, t, n) {
          dr(e);
          var r = 2 < arguments.length ? n : e;
          return vr(e, t, r);
        },
        set: function $o(e, t, n, r) {
          dr(e);
          var o = 3 < arguments.length ? r : e;
          return mr(e, t, n, o);
        },
      });
    }
    if (Object.getPrototypeOf) {
      var br = Object.getPrototypeOf;
      gr.getPrototypeOf = function Eo(e) {
        return dr(e), br(e);
      };
    }
    if (Object.setPrototypeOf && gr.getPrototypeOf) {
      var wr = function (e, t) {
        for (var n = t; n; ) {
          if (e === n) return !0;
          n = gr.getPrototypeOf(n);
        }
        return !1;
      };
      Object.assign(gr, {
        setPrototypeOf: function fi(e, t) {
          if ((dr(e), null !== t && !ce.TypeIsObject(t)))
            throw new TypeError("proto must be an object or null");
          return (
            t === ie.getPrototypeOf(e) ||
            (!(ie.isExtensible && !ie.isExtensible(e)) &&
              !wr(e, t) &&
              (Object.setPrototypeOf(e, t), !0))
          );
        },
      });
    }
    var xr = function (e, t) {
      ce.IsCallable(R.Reflect[e])
        ? a(function () {
            return R.Reflect[e](1), R.Reflect[e](NaN), R.Reflect[e](!0), !0;
          }) && te(R.Reflect, e, t)
        : v(R.Reflect, e, t);
    };
    Object.keys(gr).forEach(function (e) {
      xr(e, gr[e]);
    });
    var Ar = R.Reflect.getPrototypeOf;
    if (
      (r &&
        Ar &&
        "getPrototypeOf" !== Ar.name &&
        te(R.Reflect, "getPrototypeOf", function Eo(e) {
          return M(Ar, R.Reflect, e);
        }),
      R.Reflect.setPrototypeOf &&
        a(function () {
          return R.Reflect.setPrototypeOf(1, {}), !0;
        }) &&
        te(R.Reflect, "setPrototypeOf", gr.setPrototypeOf),
      R.Reflect.defineProperty &&
        (a(function () {
          var e = !R.Reflect.defineProperty(1, "test", { value: 1 }),
            t =
              "function" != typeof Object.preventExtensions ||
              !R.Reflect.defineProperty(
                Object.preventExtensions({}),
                "test",
                {}
              );
          return e && t;
        }) ||
          te(R.Reflect, "defineProperty", gr.defineProperty)),
      R.Reflect.construct &&
        (a(function () {
          var e = function e() {};
          return R.Reflect.construct(function () {}, [], e) instanceof e;
        }) ||
          te(R.Reflect, "construct", gr.construct)),
      "Invalid Date" !== String(new Date(NaN)))
    ) {
      var Sr = Date.prototype.toString,
        Tr = function No() {
          var e = +this;
          return e != e ? "Invalid Date" : ce.Call(Sr, this);
        };
      te(Date.prototype, "toString", Tr);
    }
    var Cr = {
      anchor: function pi(e) {
        return ce.CreateHTML(this, "a", "name", e);
      },
      big: function hi() {
        return ce.CreateHTML(this, "big", "", "");
      },
      blink: function di() {
        return ce.CreateHTML(this, "blink", "", "");
      },
      bold: function gi() {
        return ce.CreateHTML(this, "b", "", "");
      },
      fixed: function yi() {
        return ce.CreateHTML(this, "tt", "", "");
      },
      fontcolor: function vi(e) {
        return ce.CreateHTML(this, "font", "color", e);
      },
      fontsize: function mi(e) {
        return ce.CreateHTML(this, "font", "size", e);
      },
      italics: function bi() {
        return ce.CreateHTML(this, "i", "", "");
      },
      link: function wi(e) {
        return ce.CreateHTML(this, "a", "href", e);
      },
      small: function xi() {
        return ce.CreateHTML(this, "small", "", "");
      },
      strike: function Ai() {
        return ce.CreateHTML(this, "strike", "", "");
      },
      sub: function Si() {
        return ce.CreateHTML(this, "sub", "", "");
      },
      sup: function Si() {
        return ce.CreateHTML(this, "sup", "", "");
      },
    };
    y(Object.keys(Cr), function (e) {
      var t = String.prototype[e],
        n = !1;
      if (ce.IsCallable(t)) {
        var r = M(t, "", ' " '),
          o = S([], r.match(/"/g)).length;
        n = r !== r.toLowerCase() || 2 < o;
      } else n = !0;
      n && te(String.prototype, e, Cr[e]);
    });
    var Or = (function () {
        if (!ne) return !1;
        var e =
          "object" == typeof JSON && "function" == typeof JSON.stringify
            ? JSON.stringify
            : null;
        if (!e) return !1;
        if (void 0 !== e(G())) return !0;
        if ("[null]" !== e([G()])) return !0;
        var t = { a: G() };
        return (t[G()] = !0), "{}" !== e(t);
      })(),
      jr = a(function () {
        return (
          !ne ||
          ("{}" === JSON.stringify(Object(G())) &&
            "[{}]" === JSON.stringify([Object(G())]))
        );
      });
    if (Or || !jr) {
      var Er = JSON.stringify;
      te(JSON, "stringify", function Ti(e, t, n) {
        if ("symbol" != typeof e) {
          var r;
          1 < arguments.length && (r = t);
          var o = [e];
          if (u(r)) o.push(r);
          else {
            var i = ce.IsCallable(r) ? r : null,
              a = function (e, t) {
                var n = i ? M(i, this, e, t) : t;
                if ("symbol" != typeof n) return ee.symbol(n) ? Nt({})(n) : n;
              };
            o.push(a);
          }
          return 2 < arguments.length && o.push(n), Er.apply(this, o);
        }
      });
    }
    return R;
  }),
  JSON || (JSON = {}),
  (function () {
    "use strict";
    function f(e) {
      return e < 10 ? "0" + e : e;
    }
    function quote(e) {
      return (
        (escapable.lastIndex = 0),
        escapable.test(e)
          ? '"' +
            e.replace(escapable, function (e) {
              var t = meta[e];
              return "string" == typeof t
                ? t
                : "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4);
            }) +
            '"'
          : '"' + e + '"'
      );
    }
    function str(e, t) {
      var n,
        r,
        o,
        i,
        a,
        s = gap,
        u = t[e];
      switch (
        (u &&
          "object" == typeof u &&
          "function" == typeof u.toJSON &&
          (u = u.toJSON(e)),
        "function" == typeof rep && (u = rep.call(t, e, u)),
        typeof u)
      ) {
        case "string":
          return quote(u);
        case "number":
          return isFinite(u) ? String(u) : "null";
        case "boolean":
        case "null":
          return String(u);
        case "object":
          if (!u) return "null";
          if (
            ((gap += indent),
            (a = []),
            "[object Array]" === Object.prototype.toString.apply(u))
          ) {
            for (i = u.length, n = 0; n < i; n += 1) a[n] = str(n, u) || "null";
            return (
              (o =
                0 === a.length
                  ? "[]"
                  : gap
                  ? "[\n" + gap + a.join(",\n" + gap) + "\n" + s + "]"
                  : "[" + a.join(",") + "]"),
              (gap = s),
              o
            );
          }
          if (rep && "object" == typeof rep)
            for (i = rep.length, n = 0; n < i; n += 1)
              "string" == typeof rep[n] &&
                (o = str((r = rep[n]), u)) &&
                a.push(quote(r) + (gap ? ": " : ":") + o);
          else
            for (r in u)
              Object.prototype.hasOwnProperty.call(u, r) &&
                (o = str(r, u)) &&
                a.push(quote(r) + (gap ? ": " : ":") + o);
          return (
            (o =
              0 === a.length
                ? "{}"
                : gap
                ? "{\n" + gap + a.join(",\n" + gap) + "\n" + s + "}"
                : "{" + a.join(",") + "}"),
            (gap = s),
            o
          );
      }
    }
    "function" != typeof Date.prototype.toJSON &&
      ((Date.prototype.toJSON = function () {
        return isFinite(this.valueOf())
          ? this.getUTCFullYear() +
              "-" +
              f(this.getUTCMonth() + 1) +
              "-" +
              f(this.getUTCDate()) +
              "T" +
              f(this.getUTCHours()) +
              ":" +
              f(this.getUTCMinutes()) +
              ":" +
              f(this.getUTCSeconds()) +
              "Z"
          : null;
      }),
      (String.prototype.toJSON =
        Number.prototype.toJSON =
        Boolean.prototype.toJSON =
          function () {
            return this.valueOf();
          }));
    var cx =
        /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
      escapable =
        /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
      gap,
      indent,
      meta = {
        "\b": "\\b",
        "\t": "\\t",
        "\n": "\\n",
        "\f": "\\f",
        "\r": "\\r",
        '"': '\\"',
        "\\": "\\\\",
      },
      rep;
    "function" != typeof JSON.stringify &&
      (JSON.stringify = function (e, t, n) {
        var r;
        if (((indent = gap = ""), "number" == typeof n))
          for (r = 0; r < n; r += 1) indent += " ";
        else "string" == typeof n && (indent = n);
        if (
          (rep = t) &&
          "function" != typeof t &&
          ("object" != typeof t || "number" != typeof t.length)
        )
          throw new Error("JSON.stringify");
        return str("", { "": e });
      }),
      "function" != typeof JSON.parse &&
        (JSON.parse = function (text, reviver) {
          function walk(e, t) {
            var n,
              r,
              o = e[t];
            if (o && "object" == typeof o)
              for (n in o)
                Object.prototype.hasOwnProperty.call(o, n) &&
                  ((r = walk(o, n)) !== undefined ? (o[n] = r) : delete o[n]);
            return reviver.call(e, t, o);
          }
          var j;
          if (
            ((text = String(text)),
            (cx.lastIndex = 0),
            cx.test(text) &&
              (text = text.replace(cx, function (e) {
                return (
                  "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
                );
              })),
            /^[\],:{}\s]*$/.test(
              text
                .replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@")
                .replace(
                  /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
                  "]"
                )
                .replace(/(?:^|:|,)(?:\s*\[)+/g, "")
            ))
          )
            return (
              (j = eval("(" + text + ")")),
              "function" == typeof reviver ? walk({ "": j }, "") : j
            );
          throw new SyntaxError("JSON.parse");
        });
  })(),
  (function (e, t) {
    "object" == typeof exports && "undefined" != typeof module
      ? (module.exports = t())
      : "function" == typeof define && define.amd
      ? define(t)
      : (e.ES6Promise = t());
  })(this, function () {
    "use strict";
    function o(e) {
      var t = typeof e;
      return null !== e && ("object" === t || "function" === t);
    }
    function c(e) {
      return "function" == typeof e;
    }
    function e(e) {
      B = e;
    }
    function t(e) {
      W = e;
    }
    function n() {
      return function () {
        return process.nextTick(u);
      };
    }
    function r() {
      return void 0 !== q
        ? function () {
            q(u);
          }
        : s();
    }
    function i() {
      var e = 0,
        t = new J(u),
        n = document.createTextNode("");
      return (
        t.observe(n, { characterData: !0 }),
        function () {
          n.data = e = ++e % 2;
        }
      );
    }
    function a() {
      var e = new MessageChannel();
      return (
        (e.port1.onmessage = u),
        function () {
          return e.port2.postMessage(0);
        }
      );
    }
    function s() {
      var e = setTimeout;
      return function () {
        return e(u, 1);
      };
    }
    function u() {
      for (var e = 0; e < F; e += 2) {
        (0, Y[e])(Y[e + 1]), (Y[e] = undefined), (Y[e + 1] = undefined);
      }
      F = 0;
    }
    function l() {
      try {
        var e = Function("return this")().require("vertx");
        return (q = e.runOnLoop || e.runOnContext), r();
      } catch (t) {
        return s();
      }
    }
    function f(e, t) {
      var n = this,
        r = new this.constructor(h);
      r[X] === undefined && I(r);
      var o = n._state;
      if (o) {
        var i = arguments[o - 1];
        W(function () {
          return O(o, r, i, n._result);
        });
      } else T(n, r, e, t);
      return r;
    }
    function p(e) {
      var t = this;
      if (e && "object" == typeof e && e.constructor === t) return e;
      var n = new t(h);
      return w(n, e), n;
    }
    function h() {}
    function d() {
      return new TypeError("You cannot resolve a promise with itself");
    }
    function g() {
      return new TypeError(
        "A promises callback cannot return that same promise."
      );
    }
    function y(e, t, n, r) {
      try {
        e.call(t, n, r);
      } catch (o) {
        return o;
      }
    }
    function v(e, r, o) {
      W(function (t) {
        var n = !1,
          e = y(
            o,
            r,
            function (e) {
              n || ((n = !0), r !== e ? w(t, e) : A(t, e));
            },
            function (e) {
              n || ((n = !0), S(t, e));
            },
            "Settle: " + (t._label || " unknown promise")
          );
        !n && e && ((n = !0), S(t, e));
      }, e);
    }
    function m(t, e) {
      e._state === Q
        ? A(t, e._result)
        : e._state === K
        ? S(t, e._result)
        : T(
            e,
            undefined,
            function (e) {
              return w(t, e);
            },
            function (e) {
              return S(t, e);
            }
          );
    }
    function b(e, t, n) {
      t.constructor === e.constructor && n === f && t.constructor.resolve === p
        ? m(e, t)
        : n === undefined
        ? A(e, t)
        : c(n)
        ? v(e, t, n)
        : A(e, t);
    }
    function w(e, t) {
      if (e === t) S(e, d());
      else if (o(t)) {
        var n = void 0;
        try {
          n = t.then;
        } catch (r) {
          return void S(e, r);
        }
        b(e, t, n);
      } else A(e, t);
    }
    function x(e) {
      e._onerror && e._onerror(e._result), C(e);
    }
    function A(e, t) {
      e._state === Z &&
        ((e._result = t),
        (e._state = Q),
        0 !== e._subscribers.length && W(C, e));
    }
    function S(e, t) {
      e._state === Z && ((e._state = K), (e._result = t), W(x, e));
    }
    function T(e, t, n, r) {
      var o = e._subscribers,
        i = o.length;
      (e._onerror = null),
        (o[i] = t),
        (o[i + Q] = n),
        (o[i + K] = r),
        0 === i && e._state && W(C, e);
    }
    function C(e) {
      var t = e._subscribers,
        n = e._state;
      if (0 !== t.length) {
        for (
          var r = void 0, o = void 0, i = e._result, a = 0;
          a < t.length;
          a += 3
        )
          (r = t[a]), (o = t[a + n]), r ? O(n, r, o, i) : o(i);
        e._subscribers.length = 0;
      }
    }
    function O(e, t, n, r) {
      var o = c(n),
        i = void 0,
        a = void 0,
        s = !0;
      if (o) {
        try {
          i = n(r);
        } catch (u) {
          (s = !1), (a = u);
        }
        if (t === i) return void S(t, g());
      } else i = r;
      t._state !== Z ||
        (o && s
          ? w(t, i)
          : !1 === s
          ? S(t, a)
          : e === Q
          ? A(t, i)
          : e === K && S(t, i));
    }
    function j(t, e) {
      try {
        e(
          function n(e) {
            w(t, e);
          },
          function r(e) {
            S(t, e);
          }
        );
      } catch (o) {
        S(t, o);
      }
    }
    function E() {
      return $++;
    }
    function I(e) {
      (e[X] = $++),
        (e._state = undefined),
        (e._result = undefined),
        (e._subscribers = []);
    }
    function N() {
      return new Error("Array Methods must be provided an Array");
    }
    function P(e) {
      return new ee(this, e).promise;
    }
    function k(o) {
      var i = this;
      return _(o)
        ? new i(function (e, t) {
            for (var n = o.length, r = 0; r < n; r++)
              i.resolve(o[r]).then(e, t);
          })
        : new i(function (e, t) {
            return t(new TypeError("You must pass an array to race."));
          });
    }
    function D(e) {
      var t = new this(h);
      return S(t, e), t;
    }
    function M() {
      throw new TypeError(
        "You must pass a resolver function as the first argument to the promise constructor"
      );
    }
    function L() {
      throw new TypeError(
        "Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function."
      );
    }
    function R() {
      var e = void 0;
      if ("undefined" != typeof global) e = global;
      else if ("undefined" != typeof self) e = self;
      else
        try {
          e = Function("return this")();
        } catch (r) {
          throw new Error(
            "polyfill failed because global object is unavailable in this environment"
          );
        }
      var t = e.Promise;
      if (t) {
        var n = null;
        try {
          n = Object.prototype.toString.call(t.resolve());
        } catch (r) {}
        if ("[object Promise]" === n && !t.cast) return;
      }
      e.Promise = te;
    }
    var _ = Array.isArray
        ? Array.isArray
        : function (e) {
            return "[object Array]" === Object.prototype.toString.call(e);
          },
      F = 0,
      q = void 0,
      B = void 0,
      W = function W(e, t) {
        (Y[F] = e), (Y[F + 1] = t), 2 === (F += 2) && (B ? B(u) : V());
      },
      H = "undefined" != typeof window ? window : undefined,
      U = H || {},
      J = U.MutationObserver || U.WebKitMutationObserver,
      G =
        "undefined" == typeof self &&
        "undefined" != typeof process &&
        "[object process]" === {}.toString.call(process),
      z =
        "undefined" != typeof Uint8ClampedArray &&
        "undefined" != typeof importScripts &&
        "undefined" != typeof MessageChannel,
      Y = new Array(1e3),
      V = void 0;
    V = G
      ? n()
      : J
      ? i()
      : z
      ? a()
      : H === undefined && "function" == typeof require
      ? l()
      : s();
    var X = Math.random().toString(36).substring(2),
      Z = void 0,
      Q = 1,
      K = 2,
      $ = 0,
      ee = (function () {
        function e(e, t) {
          (this._instanceConstructor = e),
            (this.promise = new e(h)),
            this.promise[X] || I(this.promise),
            _(t)
              ? ((this.length = t.length),
                (this._remaining = t.length),
                (this._result = new Array(this.length)),
                0 === this.length
                  ? A(this.promise, this._result)
                  : ((this.length = this.length || 0),
                    this._enumerate(t),
                    0 === this._remaining && A(this.promise, this._result)))
              : S(this.promise, N());
        }
        return (
          (e.prototype._enumerate = function n(e) {
            for (var t = 0; this._state === Z && t < e.length; t++)
              this._eachEntry(e[t], t);
          }),
          (e.prototype._eachEntry = function c(t, e) {
            var n = this._instanceConstructor,
              r = n.resolve;
            if (r === p) {
              var o = void 0,
                i = void 0,
                a = !1;
              try {
                o = t.then;
              } catch (u) {
                (a = !0), (i = u);
              }
              if (o === f && t._state !== Z)
                this._settledAt(t._state, e, t._result);
              else if ("function" != typeof o)
                this._remaining--, (this._result[e] = t);
              else if (n === te) {
                var s = new n(h);
                a ? S(s, i) : b(s, t, o), this._willSettleAt(s, e);
              } else
                this._willSettleAt(
                  new n(function (e) {
                    return e(t);
                  }),
                  e
                );
            } else this._willSettleAt(r(t), e);
          }),
          (e.prototype._settledAt = function o(e, t, n) {
            var r = this.promise;
            r._state === Z &&
              (this._remaining--, e === K ? S(r, n) : (this._result[t] = n)),
              0 === this._remaining && A(r, this._result);
          }),
          (e.prototype._willSettleAt = function r(e, t) {
            var n = this;
            T(
              e,
              undefined,
              function (e) {
                return n._settledAt(Q, t, e);
              },
              function (e) {
                return n._settledAt(K, t, e);
              }
            );
          }),
          e
        );
      })(),
      te = (function () {
        function t(e) {
          (this[X] = E()),
            (this._result = this._state = undefined),
            (this._subscribers = []),
            h !== e &&
              ("function" != typeof e && M(),
              this instanceof t ? j(this, e) : L());
        }
        return (
          (t.prototype["catch"] = function n(e) {
            return this.then(null, e);
          }),
          (t.prototype["finally"] = function r(t) {
            var e = this,
              n = e.constructor;
            return c(t)
              ? e.then(
                  function (e) {
                    return n.resolve(t()).then(function () {
                      return e;
                    });
                  },
                  function (e) {
                    return n.resolve(t()).then(function () {
                      throw e;
                    });
                  }
                )
              : e.then(t, t);
          }),
          t
        );
      })();
    return (
      (te.prototype.then = f),
      (te.all = P),
      (te.race = k),
      (te.resolve = p),
      (te.reject = D),
      (te._setScheduler = e),
      (te._setAsap = t),
      (te._asap = W),
      (te.polyfill = R),
      (te.Promise = te).polyfill(),
      te
    );
  }),
  (function () {
    function l(i, a, s) {
      function u(t, e) {
        if (!a[t]) {
          if (!i[t]) {
            var n = "function" == typeof require && require;
            if (!e && n) return n(t, !0);
            if (c) return c(t, !0);
            var r = new Error("Cannot find module '" + t + "'");
            throw ((r.code = "MODULE_NOT_FOUND"), r);
          }
          var o = (a[t] = { exports: {} });
          i[t][0].call(
            o.exports,
            function (e) {
              return u(i[t][1][e] || e);
            },
            o,
            o.exports,
            l,
            i,
            a,
            s
          );
        }
        return a[t].exports;
      }
      for (
        var c = "function" == typeof require && require, e = 0;
        e < s.length;
        e++
      )
        u(s[e]);
      return u;
    }
    return l;
  })()(
    {
      1: [
        function (n, e) {
          e.exports = (function () {
            "use strict";
            var e = n("reflect.ownkeys"),
              t = Function.bind.call(Function.call, Array.prototype.reduce),
              r = Function.bind.call(
                Function.call,
                Object.prototype.propertyIsEnumerable
              ),
              o = Function.bind.call(Function.call, Array.prototype.concat);
            return (
              Object.values ||
                (Object.values = function i(n) {
                  return t(
                    e(n),
                    function (e, t) {
                      return o(
                        e,
                        "string" == typeof t && r(n, t) ? [n[t]] : []
                      );
                    },
                    []
                  );
                }),
              Object.entries ||
                (Object.entries = function a(n) {
                  return t(
                    e(n),
                    function (e, t) {
                      return o(
                        e,
                        "string" == typeof t && r(n, t) ? [[t, n[t]]] : []
                      );
                    },
                    []
                  );
                }),
              Object
            );
          })();
        },
        { "reflect.ownkeys": 2 },
      ],
      2: [
        function (e, t) {
          "object" == typeof Reflect && "function" == typeof Reflect.ownKeys
            ? (t.exports = Reflect.ownKeys)
            : "function" == typeof Object.getOwnPropertySymbols
            ? (t.exports = function n(e) {
                return Object.getOwnPropertyNames(e).concat(
                  Object.getOwnPropertySymbols(e)
                );
              })
            : (t.exports = Object.getOwnPropertyNames);
        },
        {},
      ],
    },
    {},
    [1]
  ),
  (function (t) {
    var e = function () {
        try {
          return !!Symbol.iterator;
        } catch (e) {
          return !1;
        }
      },
      n = e(),
      r = function (t) {
        var e = {
          next: function () {
            var e = t.shift();
            return { done: void 0 === e, value: e };
          },
        };
        return (
          n &&
            (e[Symbol.iterator] = function () {
              return e;
            }),
          e
        );
      },
      o = function (e) {
        return encodeURIComponent(e).replace(/%20/g, "+");
      },
      i = function (e) {
        return decodeURIComponent(String(e).replace(/\+/g, " "));
      },
      a = function () {
        var a = function (e) {
            Object.defineProperty(this, "_entries", {
              writable: !0,
              value: {},
            });
            var t = typeof e;
            if ("undefined" === t);
            else if ("string" === t) "" !== e && this._fromString(e);
            else if (e instanceof a) {
              var n = this;
              e.forEach(function (e, t) {
                n.append(t, e);
              });
            } else {
              if (null === e || "object" !== t)
                throw new TypeError(
                  "Unsupported input's type for URLSearchParams"
                );
              if ("[object Array]" === Object.prototype.toString.call(e))
                for (var r = 0; r < e.length; r++) {
                  var o = e[r];
                  if (
                    "[object Array]" !== Object.prototype.toString.call(o) &&
                    2 === o.length
                  )
                    throw new TypeError(
                      "Expected [string, any] as entry at index " +
                        r +
                        " of URLSearchParams's input"
                    );
                  this.append(o[0], o[1]);
                }
              else for (var i in e) e.hasOwnProperty(i) && this.append(i, e[i]);
            }
          },
          e = a.prototype;
        (e.append = function (e, t) {
          e in this._entries
            ? this._entries[e].push(String(t))
            : (this._entries[e] = [String(t)]);
        }),
          (e["delete"] = function (e) {
            delete this._entries[e];
          }),
          (e.get = function (e) {
            return e in this._entries ? this._entries[e][0] : null;
          }),
          (e.getAll = function (e) {
            return e in this._entries ? this._entries[e].slice(0) : [];
          }),
          (e.has = function (e) {
            return e in this._entries;
          }),
          (e.set = function (e, t) {
            this._entries[e] = [String(t)];
          }),
          (e.forEach = function (e, t) {
            var n;
            for (var r in this._entries)
              if (this._entries.hasOwnProperty(r)) {
                n = this._entries[r];
                for (var o = 0; o < n.length; o++) e.call(t, n[o], r, this);
              }
          }),
          (e.keys = function () {
            var n = [];
            return (
              this.forEach(function (e, t) {
                n.push(t);
              }),
              r(n)
            );
          }),
          (e.values = function () {
            var t = [];
            return (
              this.forEach(function (e) {
                t.push(e);
              }),
              r(t)
            );
          }),
          (e.entries = function () {
            var n = [];
            return (
              this.forEach(function (e, t) {
                n.push([t, e]);
              }),
              r(n)
            );
          }),
          n && (e[Symbol.iterator] = e.entries),
          (e.toString = function () {
            var n = [];
            return (
              this.forEach(function (e, t) {
                n.push(o(t) + "=" + o(e));
              }),
              n.join("&")
            );
          }),
          (t.URLSearchParams = a);
      };
    (function () {
      try {
        var e = t.URLSearchParams;
        return (
          "a=1" === new e("?a=1").toString() &&
          "function" == typeof e.prototype.set &&
          "function" == typeof e.prototype.entries
        );
      } catch (e) {
        return !1;
      }
    })() || a();
    var s = t.URLSearchParams.prototype;
    "function" != typeof s.sort &&
      (s.sort = function () {
        var n = this,
          r = [];
        this.forEach(function (e, t) {
          r.push([t, e]), n._entries || n["delete"](t);
        }),
          r.sort(function (e, t) {
            return e[0] < t[0] ? -1 : e[0] > t[0] ? 1 : 0;
          }),
          n._entries && (n._entries = {});
        for (var e = 0; e < r.length; e++) this.append(r[e][0], r[e][1]);
      }),
      "function" != typeof s._fromString &&
        Object.defineProperty(s, "_fromString", {
          enumerable: !1,
          configurable: !1,
          writable: !1,
          value: function (e) {
            if (this._entries) this._entries = {};
            else {
              var n = [];
              this.forEach(function (e, t) {
                n.push(t);
              });
              for (var t = 0; t < n.length; t++) this["delete"](n[t]);
            }
            var r,
              o = (e = e.replace(/^\?/, "")).split("&");
            for (t = 0; t < o.length; t++)
              (r = o[t].split("=")),
                this.append(i(r[0]), 1 < r.length ? i(r[1]) : "");
          },
        });
  })(
    "undefined" != typeof global
      ? global
      : "undefined" != typeof window
      ? window
      : "undefined" != typeof self
      ? self
      : this
  ),
  (function (f) {
    var e = function () {
        try {
          var e = new f.URL("b", "http://a");
          return (
            (e.pathname = "c d"), "http://a/c%20d" === e.href && e.searchParams
          );
        } catch (e) {
          return !1;
        }
      },
      t = function () {
        var t = f.URL,
          e = function (e, t) {
            "string" != typeof e && (e = String(e));
            var n,
              r = document;
            if (t && (void 0 === f.location || t !== f.location.href)) {
              ((n = (r =
                document.implementation.createHTMLDocument("")).createElement(
                "base"
              )).href = t),
                r.head.appendChild(n);
              try {
                if (0 !== n.href.indexOf(t)) throw new Error(n.href);
              } catch (e) {
                throw new Error("URL unable to set base " + t + " due to " + e);
              }
            }
            var o = r.createElement("a");
            (o.href = e), n && (r.body.appendChild(o), (o.href = o.href));
            var i = r.createElement("input");
            if (
              ((i.type = "url"),
              (i.value = e),
              ":" === o.protocol ||
                !/:/.test(o.href) ||
                (!i.checkValidity() && !t))
            )
              throw new TypeError("Invalid URL");
            Object.defineProperty(this, "_anchorElement", { value: o });
            var a = new f.URLSearchParams(this.search),
              s = !0,
              u = !0,
              c = this;
            ["append", "delete", "set"].forEach(function (e) {
              var t = a[e];
              a[e] = function () {
                t.apply(a, arguments),
                  s && ((u = !1), (c.search = a.toString()), (u = !0));
              };
            }),
              Object.defineProperty(this, "searchParams", {
                value: a,
                enumerable: !0,
              });
            var l = void 0;
            Object.defineProperty(this, "_updateSearchParams", {
              enumerable: !1,
              configurable: !1,
              writable: !1,
              value: function () {
                this.search !== l &&
                  ((l = this.search),
                  u &&
                    ((s = !1),
                    this.searchParams._fromString(this.search),
                    (s = !0)));
              },
            });
          },
          n = e.prototype,
          r = function (t) {
            Object.defineProperty(n, t, {
              get: function () {
                return this._anchorElement[t];
              },
              set: function (e) {
                this._anchorElement[t] = e;
              },
              enumerable: !0,
            });
          };
        ["hash", "host", "hostname", "port", "protocol"].forEach(function (e) {
          r(e);
        }),
          Object.defineProperty(n, "search", {
            get: function () {
              return this._anchorElement.search;
            },
            set: function (e) {
              (this._anchorElement.search = e), this._updateSearchParams();
            },
            enumerable: !0,
          }),
          Object.defineProperties(n, {
            toString: {
              get: function () {
                var e = this;
                return function () {
                  return e.href;
                };
              },
            },
            href: {
              get: function () {
                return this._anchorElement.href.replace(/\?$/, "");
              },
              set: function (e) {
                (this._anchorElement.href = e), this._updateSearchParams();
              },
              enumerable: !0,
            },
            pathname: {
              get: function () {
                return this._anchorElement.pathname.replace(/(^\/?)/, "/");
              },
              set: function (e) {
                this._anchorElement.pathname = e;
              },
              enumerable: !0,
            },
            origin: {
              get: function () {
                var e = { "http:": 80, "https:": 443, "ftp:": 21 }[
                    this._anchorElement.protocol
                  ],
                  t =
                    this._anchorElement.port != e &&
                    "" !== this._anchorElement.port;
                return (
                  this._anchorElement.protocol +
                  "//" +
                  this._anchorElement.hostname +
                  (t ? ":" + this._anchorElement.port : "")
                );
              },
              enumerable: !0,
            },
            password: {
              get: function () {
                return "";
              },
              set: function () {},
              enumerable: !0,
            },
            username: {
              get: function () {
                return "";
              },
              set: function () {},
              enumerable: !0,
            },
          }),
          (e.createObjectURL = function (e) {
            return t.createObjectURL.apply(t, arguments);
          }),
          (e.revokeObjectURL = function (e) {
            return t.revokeObjectURL.apply(t, arguments);
          }),
          (f.URL = e);
      };
    if ((e() || t(), void 0 !== f.location && !("origin" in f.location))) {
      var n = function () {
        return (
          f.location.protocol +
          "//" +
          f.location.hostname +
          (f.location.port ? ":" + f.location.port : "")
        );
      };
      try {
        Object.defineProperty(f.location, "origin", { get: n, enumerable: !0 });
      } catch (e) {
        setInterval(function () {
          f.location.origin = n();
        }, 100);
      }
    }
  })(
    "undefined" != typeof global
      ? global
      : "undefined" != typeof window
      ? window
      : "undefined" != typeof self
      ? self
      : this
  );
var URLSearchParams =
  URLSearchParams ||
  (function () {
    "use strict";
    function a(e) {
      var t,
        n,
        r,
        o,
        i,
        a,
        s = Object.create(null);
      if (((this[p] = s), e))
        if ("string" == typeof e)
          for (
            "?" === e.charAt(0) && (e = e.slice(1)),
              i = 0,
              a = (o = e.split("&")).length;
            i < a;
            i++
          )
            -1 < (t = (r = o[i]).indexOf("="))
              ? u(s, c(r.slice(0, t)), c(r.slice(t + 1)))
              : r.length && u(s, c(r), "");
        else if (l(e))
          for (i = 0, a = e.length; i < a; i++) u(s, (r = e[i])[0], r[1]);
        else for (n in e) u(s, n, e[n]);
    }
    function u(e, t, n) {
      t in e ? e[t].push("" + n) : (e[t] = l(n) ? n : ["" + n]);
    }
    function c(e) {
      return decodeURIComponent(e.replace(n, " "));
    }
    function s(e) {
      return encodeURIComponent(e).replace(t, o);
    }
    var l = Array.isArray,
      f = a.prototype,
      t = /[!'\(\)~]|%20|%00/g,
      n = /\+/g,
      r = {
        "!": "%21",
        "'": "%27",
        "(": "%28",
        ")": "%29",
        "~": "%7E",
        "%20": "+",
        "%00": "\0",
      },
      o = function (e) {
        return r[e];
      },
      p = "__URLSearchParams__:" + Math.random();
    (f.append = function i(e, t) {
      u(this[p], e, t);
    }),
      (f["delete"] = function b(e) {
        delete this[p][e];
      }),
      (f.get = function w(e) {
        var t = this[p];
        return e in t ? t[e][0] : null;
      }),
      (f.getAll = function x(e) {
        var t = this[p];
        return e in t ? t[e].slice(0) : [];
      }),
      (f.has = function A(e) {
        return e in this[p];
      }),
      (f.set = function S(e, t) {
        this[p][e] = ["" + t];
      }),
      (f.forEach = function T(n, r) {
        var e = this[p];
        Object.getOwnPropertyNames(e).forEach(function (t) {
          e[t].forEach(function (e) {
            n.call(r, e, t, this);
          }, this);
        }, this);
      }),
      (f.toJSON = function C() {
        return {};
      }),
      (f.toString = function O() {
        var e,
          t,
          n,
          r,
          o = this[p],
          i = [];
        for (t in o)
          for (n = s(t), e = 0, r = o[t]; e < r.length; e++)
            i.push(n + "=" + s(r[e]));
        return i.join("&");
      });
    var h = Object.defineProperty,
      d = Object.getOwnPropertyDescriptor,
      g = function (n) {
        function r(e, t) {
          f.append.call(this, e, t),
            (e = this.toString()),
            n.set.call(this._usp, e ? "?" + e : "");
        }
        function o(e) {
          f["delete"].call(this, e),
            (e = this.toString()),
            n.set.call(this._usp, e ? "?" + e : "");
        }
        function i(e, t) {
          f.set.call(this, e, t),
            (e = this.toString()),
            n.set.call(this._usp, e ? "?" + e : "");
        }
        return function (e, t) {
          return (
            (e.append = r),
            (e["delete"] = o),
            (e.set = i),
            h(e, "_usp", { configurable: !0, writable: !0, value: t })
          );
        };
      },
      y = function (n) {
        return function (e, t) {
          return (
            h(e, "_searchParams", {
              configurable: !0,
              writable: !0,
              value: n(t, e),
            }),
            t
          );
        };
      },
      v = function (e) {
        var t = e.append;
        (e.append = f.append),
          a.call(e, e._usp.search.slice(1)),
          (e.append = t);
      },
      m = function (e, t) {
        if (!(e instanceof t))
          throw new TypeError(
            "'searchParams' accessed on an object that does not implement interface " +
              t.name
          );
      },
      e = function (t) {
        var n,
          e = t.prototype,
          r = d(e, "searchParams"),
          o = d(e, "href"),
          i = d(e, "search");
        !r &&
          i &&
          i.set &&
          ((n = y(g(i))),
          Object.defineProperties(e, {
            href: {
              get: function () {
                return o.get.call(this);
              },
              set: function (e) {
                var t = this._searchParams;
                o.set.call(this, e), t && v(t);
              },
            },
            search: {
              get: function () {
                return i.get.call(this);
              },
              set: function (e) {
                var t = this._searchParams;
                i.set.call(this, e), t && v(t);
              },
            },
            searchParams: {
              get: function () {
                return (
                  m(this, t),
                  this._searchParams || n(this, new a(this.search.slice(1)))
                );
              },
              set: function (e) {
                m(this, t), n(this, e);
              },
            },
          }));
      };
    return (
      e(HTMLAnchorElement),
      /^function|object$/.test(typeof URL) && URL.prototype && e(URL),
      a
    );
  })();
!(function (e) {
  var r = (function () {
    try {
      return !!Symbol.iterator;
    } catch (e) {
      return !1;
    }
  })();
  "forEach" in e ||
    (e.forEach = function t(n, r) {
      var e = Object.create(null);
      this.toString()
        .replace(/=[\s\S]*?(?:&|$)/g, "=")
        .split("=")
        .forEach(function (t) {
          !t.length ||
            t in e ||
            (e[t] = this.getAll(t)).forEach(function (e) {
              n.call(r, e, t, this);
            }, this);
        }, this);
    }),
    "keys" in e ||
      (e.keys = function o() {
        var n = [];
        this.forEach(function (e, t) {
          n.push(t);
        });
        var e = {
          next: function () {
            var e = n.shift();
            return { done: e === undefined, value: e };
          },
        };
        return (
          r &&
            (e[Symbol.iterator] = function () {
              return e;
            }),
          e
        );
      }),
    "values" in e ||
      (e.values = function n() {
        var t = [];
        this.forEach(function (e) {
          t.push(e);
        });
        var e = {
          next: function () {
            var e = t.shift();
            return { done: e === undefined, value: e };
          },
        };
        return (
          r &&
            (e[Symbol.iterator] = function () {
              return e;
            }),
          e
        );
      }),
    "entries" in e ||
      (e.entries = function i() {
        var n = [];
        this.forEach(function (e, t) {
          n.push([t, e]);
        });
        var e = {
          next: function () {
            var e = n.shift();
            return { done: e === undefined, value: e };
          },
        };
        return (
          r &&
            (e[Symbol.iterator] = function () {
              return e;
            }),
          e
        );
      }),
    !r || Symbol.iterator in e || (e[Symbol.iterator] = e.entries),
    "sort" in e ||
      (e.sort = function u() {
        for (
          var e,
            t,
            n,
            r = this.entries(),
            o = r.next(),
            i = o.done,
            a = [],
            s = Object.create(null);
          !i;

        )
          (t = (n = o.value)[0]),
            a.push(t),
            t in s || (s[t] = []),
            s[t].push(n[1]),
            (i = (o = r.next()).done);
        for (a.sort(), e = 0; e < a.length; e++) this["delete"](a[e]);
        for (e = 0; e < a.length; e++) (t = a[e]), this.append(t, s[t].shift());
      });
})(URLSearchParams.prototype),
  (function (e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports
      ? (module.exports = e.document
          ? t(e, !0)
          : function (e) {
              if (!e.document)
                throw new Error("jQuery requires a window with a document");
              return t(e);
            })
      : t(e);
  })("undefined" != typeof window ? window : this, function (S, e) {
    "use strict";
    function g(e, t, n) {
      var r,
        o,
        i = (n = n || fe).createElement("script");
      if (((i.text = e), t))
        for (r in pe)
          (o = t[r] || (t.getAttribute && t.getAttribute(r))) &&
            i.setAttribute(r, o);
      n.head.appendChild(i).parentNode.removeChild(i);
    }
    function y(e) {
      return null == e
        ? e + ""
        : "object" == typeof e || "function" == typeof e
        ? re[oe.call(e)] || "object"
        : typeof e;
    }
    function s(e) {
      var t = !!e && "length" in e && e.length,
        n = y(e);
      return (
        !ce(e) &&
        !le(e) &&
        ("array" === n ||
          0 === t ||
          ("number" == typeof t && 0 < t && t - 1 in e))
      );
    }
    function c(e, t) {
      return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
    }
    function t(e, n, r) {
      return ce(n)
        ? de.grep(e, function (e, t) {
            return !!n.call(e, t, e) !== r;
          })
        : n.nodeType
        ? de.grep(e, function (e) {
            return (e === n) !== r;
          })
        : "string" != typeof n
        ? de.grep(e, function (e) {
            return -1 < ne.call(n, e) !== r;
          })
        : de.filter(n, e, r);
    }
    function n(e, t) {
      for (; (e = e[t]) && 1 !== e.nodeType; );
      return e;
    }
    function l(e) {
      return e;
    }
    function f(e) {
      throw e;
    }
    function u(e, t, n, r) {
      var o;
      try {
        e && ce((o = e.promise))
          ? o.call(e).done(t).fail(n)
          : e && ce((o = e.then))
          ? o.call(e, t, n)
          : t.apply(void 0, [e].slice(r));
      } catch (e) {
        n.apply(void 0, [e]);
      }
    }
    function r() {
      fe.removeEventListener("DOMContentLoaded", r),
        S.removeEventListener("load", r),
        de.ready();
    }
    function o(e, t) {
      return t.toUpperCase();
    }
    function p(e) {
      return e.replace(Ee, "ms-").replace(Ie, o);
    }
    function i() {
      this.expando = de.expando + i.uid++;
    }
    function h(e, t, n) {
      var r, o;
      if (void 0 === n && 1 === e.nodeType)
        if (
          ((r = "data-" + t.replace(Me, "-$&").toLowerCase()),
          "string" == typeof (n = e.getAttribute(r)))
        ) {
          try {
            n =
              "true" === (o = n) ||
              ("false" !== o &&
                ("null" === o
                  ? null
                  : o === +o + ""
                  ? +o
                  : De.test(o)
                  ? JSON.parse(o)
                  : o));
          } catch (e) {}
          ke.set(e, t, n);
        } else n = void 0;
      return n;
    }
    function d(e, t, n, r) {
      var o,
        i,
        a = 20,
        s = r
          ? function () {
              return r.cur();
            }
          : function () {
              return de.css(e, t, "");
            },
        u = s(),
        c = (n && n[3]) || (de.cssNumber[t] ? "" : "px"),
        l =
          e.nodeType &&
          (de.cssNumber[t] || ("px" !== c && +u)) &&
          Re.exec(de.css(e, t));
      if (l && l[3] !== c) {
        for (u /= 2, c = c || l[3], l = +u || 1; a--; )
          de.style(e, t, l + c),
            (1 - i) * (1 - (i = s() / u || 0.5)) <= 0 && (a = 0),
            (l /= i);
        (l *= 2), de.style(e, t, l + c), (n = n || []);
      }
      return (
        n &&
          ((l = +l || +u || 0),
          (o = n[1] ? l + (n[1] + 1) * n[2] : +n[2]),
          r && ((r.unit = c), (r.start = l), (r.end = o))),
        o
      );
    }
    function v(e, t) {
      for (var n, r, o, i, a, s, u, c = [], l = 0, f = e.length; l < f; l++)
        (r = e[l]).style &&
          ((n = r.style.display),
          t
            ? ("none" === n &&
                ((c[l] = Pe.get(r, "display") || null),
                c[l] || (r.style.display = "")),
              "" === r.style.display &&
                We(r) &&
                (c[l] =
                  ((u = a = i = void 0),
                  (a = (o = r).ownerDocument),
                  (s = o.nodeName),
                  (u = He[s]) ||
                    ((i = a.body.appendChild(a.createElement(s))),
                    (u = de.css(i, "display")),
                    i.parentNode.removeChild(i),
                    "none" === u && (u = "block"),
                    (He[s] = u)))))
            : "none" !== n && ((c[l] = "none"), Pe.set(r, "display", n)));
      for (l = 0; l < f; l++) null != c[l] && (e[l].style.display = c[l]);
      return e;
    }
    function m(e, t) {
      var n;
      return (
        (n =
          "undefined" != typeof e.getElementsByTagName
            ? e.getElementsByTagName(t || "*")
            : "undefined" != typeof e.querySelectorAll
            ? e.querySelectorAll(t || "*")
            : []),
        void 0 === t || (t && c(e, t)) ? de.merge([e], n) : n
      );
    }
    function b(e, t) {
      for (var n = 0, r = e.length; n < r; n++)
        Pe.set(e[n], "globalEval", !t || Pe.get(t[n], "globalEval"));
    }
    function w(e, t, n, r, o) {
      for (
        var i,
          a,
          s,
          u,
          c,
          l,
          f = t.createDocumentFragment(),
          p = [],
          h = 0,
          d = e.length;
        h < d;
        h++
      )
        if ((i = e[h]) || 0 === i)
          if ("object" === y(i)) de.merge(p, i.nodeType ? [i] : i);
          else if (Xe.test(i)) {
            for (
              a = a || f.appendChild(t.createElement("div")),
                s = (ze.exec(i) || ["", ""])[1].toLowerCase(),
                u = Ve[s] || Ve._default,
                a.innerHTML = u[1] + de.htmlPrefilter(i) + u[2],
                l = u[0];
              l--;

            )
              a = a.lastChild;
            de.merge(p, a.childNodes), ((a = f.firstChild).textContent = "");
          } else p.push(t.createTextNode(i));
      for (f.textContent = "", h = 0; (i = p[h++]); )
        if (r && -1 < de.inArray(i, r)) o && o.push(i);
        else if (
          ((c = qe(i)), (a = m(f.appendChild(i), "script")), c && b(a), n)
        )
          for (l = 0; (i = a[l++]); ) Ye.test(i.type || "") && n.push(i);
      return f;
    }
    function a() {
      return !0;
    }
    function x() {
      return !1;
    }
    function A(e, t) {
      return (
        (e ===
          (function () {
            try {
              return fe.activeElement;
            } catch (e) {}
          })()) ==
        ("focus" === t)
      );
    }
    function T(e, t, n, r, o, i) {
      var a, s;
      if ("object" == typeof t) {
        for (s in ("string" != typeof n && ((r = r || n), (n = void 0)), t))
          T(e, s, n, r, t[s], i);
        return e;
      }
      if (
        (null == r && null == o
          ? ((o = n), (r = n = void 0))
          : null == o &&
            ("string" == typeof n
              ? ((o = r), (r = void 0))
              : ((o = r), (r = n), (n = void 0))),
        !1 === o)
      )
        o = x;
      else if (!o) return e;
      return (
        1 === i &&
          ((a = o),
          ((o = function (e) {
            return de().off(e), a.apply(this, arguments);
          }).guid = a.guid || (a.guid = de.guid++))),
        e.each(function () {
          de.event.add(this, t, o, r, n);
        })
      );
    }
    function C(e, o, i) {
      i
        ? (Pe.set(e, o, !1),
          de.event.add(e, o, {
            namespace: !1,
            handler: function (e) {
              var t,
                n,
                r = Pe.get(this, o);
              if (1 & e.isTrigger && this[o]) {
                if (r.length)
                  (de.event.special[o] || {}).delegateType &&
                    e.stopPropagation();
                else if (
                  ((r = $.call(arguments)),
                  Pe.set(this, o, r),
                  (t = i(this, o)),
                  this[o](),
                  r !== (n = Pe.get(this, o)) || t
                    ? Pe.set(this, o, !1)
                    : (n = {}),
                  r !== n)
                )
                  return (
                    e.stopImmediatePropagation(), e.preventDefault(), n.value
                  );
              } else
                r.length &&
                  (Pe.set(this, o, {
                    value: de.event.trigger(
                      de.extend(r[0], de.Event.prototype),
                      r.slice(1),
                      this
                    ),
                  }),
                  e.stopImmediatePropagation());
            },
          }))
        : void 0 === Pe.get(e, o) && de.event.add(e, o, a);
    }
    function O(e, t) {
      return (
        (c(e, "table") &&
          c(11 !== t.nodeType ? t : t.firstChild, "tr") &&
          de(e).children("tbody")[0]) ||
        e
      );
    }
    function j(e) {
      return (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e;
    }
    function E(e) {
      return (
        "true/" === (e.type || "").slice(0, 5)
          ? (e.type = e.type.slice(5))
          : e.removeAttribute("type"),
        e
      );
    }
    function I(e, t) {
      var n, r, o, i, a, s;
      if (1 === t.nodeType) {
        if (Pe.hasData(e) && (s = Pe.get(e).events))
          for (o in (Pe.remove(t, "handle events"), s))
            for (n = 0, r = s[o].length; n < r; n++)
              de.event.add(t, o, s[o][n]);
        ke.hasData(e) &&
          ((i = ke.access(e)), (a = de.extend({}, i)), ke.set(t, a));
      }
    }
    function N(n, r, o, i) {
      r = ee(r);
      var e,
        t,
        a,
        s,
        u,
        c,
        l = 0,
        f = n.length,
        p = f - 1,
        h = r[0],
        d = ce(h);
      if (d || (1 < f && "string" == typeof h && !ue.checkClone && et.test(h)))
        return n.each(function (e) {
          var t = n.eq(e);
          d && (r[0] = h.call(this, e, t.html())), N(t, r, o, i);
        });
      if (
        f &&
        ((t = (e = w(r, n[0].ownerDocument, !1, n, i)).firstChild),
        1 === e.childNodes.length && (e = t),
        t || i)
      ) {
        for (s = (a = de.map(m(e, "script"), j)).length; l < f; l++)
          (u = e),
            l !== p &&
              ((u = de.clone(u, !0, !0)), s && de.merge(a, m(u, "script"))),
            o.call(n[l], u, l);
        if (s)
          for (
            c = a[a.length - 1].ownerDocument, de.map(a, E), l = 0;
            l < s;
            l++
          )
            (u = a[l]),
              Ye.test(u.type || "") &&
                !Pe.access(u, "globalEval") &&
                de.contains(c, u) &&
                (u.src && "module" !== (u.type || "").toLowerCase()
                  ? de._evalUrl &&
                    !u.noModule &&
                    de._evalUrl(
                      u.src,
                      { nonce: u.nonce || u.getAttribute("nonce") },
                      c
                    )
                  : g(u.textContent.replace(tt, ""), u, c));
      }
      return n;
    }
    function P(e, t, n) {
      for (var r, o = t ? de.filter(t, e) : e, i = 0; null != (r = o[i]); i++)
        n || 1 !== r.nodeType || de.cleanData(m(r)),
          r.parentNode &&
            (n && qe(r) && b(m(r, "script")), r.parentNode.removeChild(r));
      return e;
    }
    function k(e, t, n) {
      var r,
        o,
        i,
        a,
        s = e.style;
      return (
        (n = n || rt(e)) &&
          ("" !== (a = n.getPropertyValue(t) || n[t]) ||
            qe(e) ||
            (a = de.style(e, t)),
          !ue.pixelBoxStyles() &&
            nt.test(a) &&
            it.test(t) &&
            ((r = s.width),
            (o = s.minWidth),
            (i = s.maxWidth),
            (s.minWidth = s.maxWidth = s.width = a),
            (a = n.width),
            (s.width = r),
            (s.minWidth = o),
            (s.maxWidth = i))),
        void 0 !== a ? a + "" : a
      );
    }
    function D(e, t) {
      return {
        get: function () {
          if (!e()) return (this.get = t).apply(this, arguments);
          delete this.get;
        },
      };
    }
    function M(e) {
      return (
        de.cssProps[e] ||
        ut[e] ||
        (e in st
          ? e
          : (ut[e] =
              (function (e) {
                for (
                  var t = e[0].toUpperCase() + e.slice(1), n = at.length;
                  n--;

                )
                  if ((e = at[n] + t) in st) return e;
              })(e) || e))
      );
    }
    function L(e, t, n) {
      var r = Re.exec(t);
      return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t;
    }
    function R(e, t, n, r, o, i) {
      var a = "width" === t ? 1 : 0,
        s = 0,
        u = 0;
      if (n === (r ? "border" : "content")) return 0;
      for (; a < 4; a += 2)
        "margin" === n && (u += de.css(e, n + _e[a], !0, o)),
          r
            ? ("content" === n && (u -= de.css(e, "padding" + _e[a], !0, o)),
              "margin" !== n &&
                (u -= de.css(e, "border" + _e[a] + "Width", !0, o)))
            : ((u += de.css(e, "padding" + _e[a], !0, o)),
              "padding" !== n
                ? (u += de.css(e, "border" + _e[a] + "Width", !0, o))
                : (s += de.css(e, "border" + _e[a] + "Width", !0, o)));
      return (
        !r &&
          0 <= i &&
          (u +=
            Math.max(
              0,
              Math.ceil(
                e["offset" + t[0].toUpperCase() + t.slice(1)] - i - u - s - 0.5
              )
            ) || 0),
        u
      );
    }
    function _(e, t, n) {
      var r = rt(e),
        o =
          (!ue.boxSizingReliable() || n) &&
          "border-box" === de.css(e, "boxSizing", !1, r),
        i = o,
        a = k(e, t, r),
        s = "offset" + t[0].toUpperCase() + t.slice(1);
      if (nt.test(a)) {
        if (!n) return a;
        a = "auto";
      }
      return (
        ((!ue.boxSizingReliable() && o) ||
          (!ue.reliableTrDimensions() && c(e, "tr")) ||
          "auto" === a ||
          (!parseFloat(a) && "inline" === de.css(e, "display", !1, r))) &&
          e.getClientRects().length &&
          ((o = "border-box" === de.css(e, "boxSizing", !1, r)),
          (i = s in e) && (a = e[s])),
        (a = parseFloat(a) || 0) +
          R(e, t, n || (o ? "border" : "content"), i, r, a) +
          "px"
      );
    }
    function F(e, t, n, r, o) {
      return new F.prototype.init(e, t, n, r, o);
    }
    function q() {
      dt &&
        (!1 === fe.hidden && S.requestAnimationFrame
          ? S.requestAnimationFrame(q)
          : S.setTimeout(q, de.fx.interval),
        de.fx.tick());
    }
    function B() {
      return (
        S.setTimeout(function () {
          ht = void 0;
        }),
        (ht = Date.now())
      );
    }
    function W(e, t) {
      var n,
        r = 0,
        o = { height: e };
      for (t = t ? 1 : 0; r < 4; r += 2 - t)
        o["margin" + (n = _e[r])] = o["padding" + n] = e;
      return t && (o.opacity = o.width = e), o;
    }
    function H(e, t, n) {
      for (
        var r,
          o = (U.tweeners[t] || []).concat(U.tweeners["*"]),
          i = 0,
          a = o.length;
        i < a;
        i++
      )
        if ((r = o[i].call(n, t, e))) return r;
    }
    function U(i, e, t) {
      var n,
        a,
        r = 0,
        o = U.prefilters.length,
        s = de.Deferred().always(function () {
          delete u.elem;
        }),
        u = function () {
          if (a) return !1;
          for (
            var e = ht || B(),
              t = Math.max(0, c.startTime + c.duration - e),
              n = 1 - (t / c.duration || 0),
              r = 0,
              o = c.tweens.length;
            r < o;
            r++
          )
            c.tweens[r].run(n);
          return (
            s.notifyWith(i, [c, n, t]),
            n < 1 && o
              ? t
              : (o || s.notifyWith(i, [c, 1, 0]), s.resolveWith(i, [c]), !1)
          );
        },
        c = s.promise({
          elem: i,
          props: de.extend({}, e),
          opts: de.extend(
            !0,
            { specialEasing: {}, easing: de.easing._default },
            t
          ),
          originalProperties: e,
          originalOptions: t,
          startTime: ht || B(),
          duration: t.duration,
          tweens: [],
          createTween: function (e, t) {
            var n = de.Tween(
              i,
              c.opts,
              e,
              t,
              c.opts.specialEasing[e] || c.opts.easing
            );
            return c.tweens.push(n), n;
          },
          stop: function (e) {
            var t = 0,
              n = e ? c.tweens.length : 0;
            if (a) return this;
            for (a = !0; t < n; t++) c.tweens[t].run(1);
            return (
              e
                ? (s.notifyWith(i, [c, 1, 0]), s.resolveWith(i, [c, e]))
                : s.rejectWith(i, [c, e]),
              this
            );
          },
        }),
        l = c.props;
      for (
        (function (e, t) {
          var n, r, o, i, a;
          for (n in e)
            if (
              ((o = t[(r = p(n))]),
              (i = e[n]),
              Array.isArray(i) && ((o = i[1]), (i = e[n] = i[0])),
              n !== r && ((e[r] = i), delete e[n]),
              (a = de.cssHooks[r]) && ("expand" in a))
            )
              for (n in ((i = a.expand(i)), delete e[r], i))
                (n in e) || ((e[n] = i[n]), (t[n] = o));
            else t[r] = o;
        })(l, c.opts.specialEasing);
        r < o;
        r++
      )
        if ((n = U.prefilters[r].call(c, i, l, c.opts)))
          return (
            ce(n.stop) &&
              (de._queueHooks(c.elem, c.opts.queue).stop = n.stop.bind(n)),
            n
          );
      return (
        de.map(l, H, c),
        ce(c.opts.start) && c.opts.start.call(i, c),
        c
          .progress(c.opts.progress)
          .done(c.opts.done, c.opts.complete)
          .fail(c.opts.fail)
          .always(c.opts.always),
        de.fx.timer(de.extend(u, { elem: i, anim: c, queue: c.opts.queue })),
        c
      );
    }
    function J(e) {
      return (e.match(Te) || []).join(" ");
    }
    function G(e) {
      return (e.getAttribute && e.getAttribute("class")) || "";
    }
    function z(e) {
      return Array.isArray(e) ? e : ("string" == typeof e && e.match(Te)) || [];
    }
    function Y(n, e, r, o) {
      var t;
      if (Array.isArray(e))
        de.each(e, function (e, t) {
          r || It.test(n)
            ? o(n, t)
            : Y(
                n + "[" + ("object" == typeof t && null != t ? e : "") + "]",
                t,
                r,
                o
              );
        });
      else if (r || "object" !== y(e)) o(n, e);
      else for (t in e) Y(n + "[" + t + "]", e[t], r, o);
    }
    function V(i) {
      return function (e, t) {
        "string" != typeof e && ((t = e), (e = "*"));
        var n,
          r = 0,
          o = e.toLowerCase().match(Te) || [];
        if (ce(t))
          for (; (n = o[r++]); )
            "+" === n[0]
              ? ((n = n.slice(1) || "*"), (i[n] = i[n] || []).unshift(t))
              : (i[n] = i[n] || []).push(t);
      };
    }
    function X(t, o, i, a) {
      function s(e) {
        var r;
        return (
          (u[e] = !0),
          de.each(t[e] || [], function (e, t) {
            var n = t(o, i, a);
            return "string" != typeof n || c || u[n]
              ? c
                ? !(r = n)
                : void 0
              : (o.dataTypes.unshift(n), s(n), !1);
          }),
          r
        );
      }
      var u = {},
        c = t === Bt;
      return s(o.dataTypes[0]) || (!u["*"] && s("*"));
    }
    function Z(e, t) {
      var n,
        r,
        o = de.ajaxSettings.flatOptions || {};
      for (n in t) void 0 !== t[n] && ((o[n] ? e : r || (r = {}))[n] = t[n]);
      return r && de.extend(!0, e, r), e;
    }
    var Q = [],
      K = Object.getPrototypeOf,
      $ = Q.slice,
      ee = Q.flat
        ? function (e) {
            return Q.flat.call(e);
          }
        : function (e) {
            return Q.concat.apply([], e);
          },
      te = Q.push,
      ne = Q.indexOf,
      re = {},
      oe = re.toString,
      ie = re.hasOwnProperty,
      ae = ie.toString,
      se = ae.call(Object),
      ue = {},
      ce = function (e) {
        return "function" == typeof e && "number" != typeof e.nodeType;
      },
      le = function (e) {
        return null != e && e === e.window;
      },
      fe = S.document,
      pe = { type: !0, src: !0, nonce: !0, noModule: !0 },
      he = "3.5.1",
      de = function (e, t) {
        return new de.fn.init(e, t);
      };
    (de.fn = de.prototype =
      {
        jquery: he,
        constructor: de,
        length: 0,
        toArray: function () {
          return $.call(this);
        },
        get: function (e) {
          return null == e
            ? $.call(this)
            : e < 0
            ? this[e + this.length]
            : this[e];
        },
        pushStack: function (e) {
          var t = de.merge(this.constructor(), e);
          return (t.prevObject = this), t;
        },
        each: function (e) {
          return de.each(this, e);
        },
        map: function (n) {
          return this.pushStack(
            de.map(this, function (e, t) {
              return n.call(e, t, e);
            })
          );
        },
        slice: function () {
          return this.pushStack($.apply(this, arguments));
        },
        first: function () {
          return this.eq(0);
        },
        last: function () {
          return this.eq(-1);
        },
        even: function () {
          return this.pushStack(
            de.grep(this, function (e, t) {
              return (t + 1) % 2;
            })
          );
        },
        odd: function () {
          return this.pushStack(
            de.grep(this, function (e, t) {
              return t % 2;
            })
          );
        },
        eq: function (e) {
          var t = this.length,
            n = +e + (e < 0 ? t : 0);
          return this.pushStack(0 <= n && n < t ? [this[n]] : []);
        },
        end: function () {
          return this.prevObject || this.constructor();
        },
        push: te,
        sort: Q.sort,
        splice: Q.splice,
      }),
      (de.extend = de.fn.extend =
        function (e) {
          var t,
            n,
            r,
            o,
            i,
            a,
            s = e || {},
            u = 1,
            c = arguments.length,
            l = !1;
          for (
            "boolean" == typeof s && ((l = s), (s = arguments[u] || {}), u++),
              "object" == typeof s || ce(s) || (s = {}),
              u === c && ((s = this), u--);
            u < c;
            u++
          )
            if (null != (t = arguments[u]))
              for (n in t)
                (o = t[n]),
                  "__proto__" !== n &&
                    s !== o &&
                    (l && o && (de.isPlainObject(o) || (i = Array.isArray(o)))
                      ? ((r = s[n]),
                        (a =
                          i && !Array.isArray(r)
                            ? []
                            : i || de.isPlainObject(r)
                            ? r
                            : {}),
                        (i = !1),
                        (s[n] = de.extend(l, a, o)))
                      : void 0 !== o && (s[n] = o));
          return s;
        }),
      de.extend({
        expando: "jQuery" + (he + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function (e) {
          throw new Error(e);
        },
        noop: function () {},
        isPlainObject: function (e) {
          var t, n;
          return !(
            !e ||
            "[object Object]" !== oe.call(e) ||
            ((t = K(e)) &&
              ("function" !=
                typeof (n = ie.call(t, "constructor") && t.constructor) ||
                ae.call(n) !== se))
          );
        },
        isEmptyObject: function (e) {
          var t;
          for (t in e) return !1;
          return !0;
        },
        globalEval: function (e, t, n) {
          g(e, { nonce: t && t.nonce }, n);
        },
        each: function (e, t) {
          var n,
            r = 0;
          if (s(e))
            for (n = e.length; r < n && !1 !== t.call(e[r], r, e[r]); r++);
          else for (r in e) if (!1 === t.call(e[r], r, e[r])) break;
          return e;
        },
        makeArray: function (e, t) {
          var n = t || [];
          return (
            null != e &&
              (s(Object(e))
                ? de.merge(n, "string" == typeof e ? [e] : e)
                : te.call(n, e)),
            n
          );
        },
        inArray: function (e, t, n) {
          return null == t ? -1 : ne.call(t, e, n);
        },
        merge: function (e, t) {
          for (var n = +t.length, r = 0, o = e.length; r < n; r++)
            e[o++] = t[r];
          return (e.length = o), e;
        },
        grep: function (e, t, n) {
          for (var r = [], o = 0, i = e.length, a = !n; o < i; o++)
            !t(e[o], o) !== a && r.push(e[o]);
          return r;
        },
        map: function (e, t, n) {
          var r,
            o,
            i = 0,
            a = [];
          if (s(e))
            for (r = e.length; i < r; i++)
              null != (o = t(e[i], i, n)) && a.push(o);
          else for (i in e) null != (o = t(e[i], i, n)) && a.push(o);
          return ee(a);
        },
        guid: 1,
        support: ue,
      }),
      "function" == typeof Symbol &&
        (de.fn[Symbol.iterator] = Q[Symbol.iterator]),
      de.each(
        "Boolean Number String Function Array Date RegExp Object Error Symbol".split(
          " "
        ),
        function (e, t) {
          re["[object " + t + "]"] = t.toLowerCase();
        }
      );
    var ge = (function (n) {
      function w(e, t, n, r) {
        var o,
          i,
          a,
          s,
          u,
          c,
          l,
          f = t && t.ownerDocument,
          p = t ? t.nodeType : 9;
        if (
          ((n = n || []),
          "string" != typeof e || !e || (1 !== p && 9 !== p && 11 !== p))
        )
          return n;
        if (!r && (N(t), (t = t || P), D)) {
          if (11 !== p && (u = ve.exec(e)))
            if ((o = u[1])) {
              if (9 === p) {
                if (!(a = t.getElementById(o))) return n;
                if (a.id === o) return n.push(a), n;
              } else if (
                f &&
                (a = f.getElementById(o)) &&
                _(t, a) &&
                a.id === o
              )
                return n.push(a), n;
            } else {
              if (u[2]) return Q.apply(n, t.getElementsByTagName(e)), n;
              if (
                (o = u[3]) &&
                v.getElementsByClassName &&
                t.getElementsByClassName
              )
                return Q.apply(n, t.getElementsByClassName(o)), n;
            }
          if (
            v.qsa &&
            !G[e + " "] &&
            (!M || !M.test(e)) &&
            (1 !== p || "object" !== t.nodeName.toLowerCase())
          ) {
            if (((l = e), (f = t), 1 === p && (ce.test(e) || ue.test(e)))) {
              for (
                ((f = (me.test(e) && h(t.parentNode)) || t) === t && v.scope) ||
                  ((s = t.getAttribute("id"))
                    ? (s = s.replace(xe, Ae))
                    : t.setAttribute("id", (s = F))),
                  i = (c = T(e)).length;
                i--;

              )
                c[i] = (s ? "#" + s : ":scope") + " " + d(c[i]);
              l = c.join(",");
            }
            try {
              return Q.apply(n, f.querySelectorAll(l)), n;
            } catch (t) {
              G(e, !0);
            } finally {
              s === F && t.removeAttribute("id");
            }
          }
        }
        return O(e.replace(ae, "$1"), t, n, r);
      }
      function e() {
        var n = [];
        return function r(e, t) {
          return (
            n.push(e + " ") > A.cacheLength && delete r[n.shift()],
            (r[e + " "] = t)
          );
        };
      }
      function u(e) {
        return (e[F] = !0), e;
      }
      function o(e) {
        var t = P.createElement("fieldset");
        try {
          return !!e(t);
        } catch (e) {
          return !1;
        } finally {
          t.parentNode && t.parentNode.removeChild(t), (t = null);
        }
      }
      function t(e, t) {
        for (var n = e.split("|"), r = n.length; r--; ) A.attrHandle[n[r]] = t;
      }
      function c(e, t) {
        var n = t && e,
          r =
            n &&
            1 === e.nodeType &&
            1 === t.nodeType &&
            e.sourceIndex - t.sourceIndex;
        if (r) return r;
        if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
        return e ? 1 : -1;
      }
      function r(t) {
        return function (e) {
          return "input" === e.nodeName.toLowerCase() && e.type === t;
        };
      }
      function i(n) {
        return function (e) {
          var t = e.nodeName.toLowerCase();
          return ("input" === t || "button" === t) && e.type === n;
        };
      }
      function a(t) {
        return function (e) {
          return "form" in e
            ? e.parentNode && !1 === e.disabled
              ? "label" in e
                ? "label" in e.parentNode
                  ? e.parentNode.disabled === t
                  : e.disabled === t
                : e.isDisabled === t || (e.isDisabled !== !t && Te(e) === t)
              : e.disabled === t
            : "label" in e && e.disabled === t;
        };
      }
      function s(a) {
        return u(function (i) {
          return (
            (i = +i),
            u(function (e, t) {
              for (var n, r = a([], e.length, i), o = r.length; o--; )
                e[(n = r[o])] && (e[n] = !(t[n] = e[n]));
            })
          );
        });
      }
      function h(e) {
        return e && "undefined" != typeof e.getElementsByTagName && e;
      }
      function l() {}
      function d(e) {
        for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
        return r;
      }
      function f(s, e, t) {
        var u = e.dir,
          c = e.next,
          l = c || u,
          f = t && "parentNode" === l,
          p = W++;
        return e.first
          ? function (e, t, n) {
              for (; (e = e[u]); ) if (1 === e.nodeType || f) return s(e, t, n);
              return !1;
            }
          : function (e, t, n) {
              var r,
                o,
                i,
                a = [B, p];
              if (n) {
                for (; (e = e[u]); )
                  if ((1 === e.nodeType || f) && s(e, t, n)) return !0;
              } else
                for (; (e = e[u]); )
                  if (1 === e.nodeType || f)
                    if (
                      ((o =
                        (i = e[F] || (e[F] = {}))[e.uniqueID] ||
                        (i[e.uniqueID] = {})),
                      c && c === e.nodeName.toLowerCase())
                    )
                      e = e[u] || e;
                    else {
                      if ((r = o[l]) && r[0] === B && r[1] === p)
                        return (a[2] = r[2]);
                      if (((o[l] = a)[2] = s(e, t, n))) return !0;
                    }
              return !1;
            };
      }
      function p(o) {
        return 1 < o.length
          ? function (e, t, n) {
              for (var r = o.length; r--; ) if (!o[r](e, t, n)) return !1;
              return !0;
            }
          : o[0];
      }
      function x(e, t, n, r, o) {
        for (var i, a = [], s = 0, u = e.length, c = null != t; s < u; s++)
          (i = e[s]) && ((n && !n(i, r, o)) || (a.push(i), c && t.push(s)));
        return a;
      }
      function m(h, d, g, y, v, e) {
        return (
          y && !y[F] && (y = m(y)),
          v && !v[F] && (v = m(v, e)),
          u(function (e, t, n, r) {
            var o,
              i,
              a,
              s = [],
              u = [],
              c = t.length,
              l =
                e ||
                (function (e, t, n) {
                  for (var r = 0, o = t.length; r < o; r++) w(e, t[r], n);
                  return n;
                })(d || "*", n.nodeType ? [n] : n, []),
              f = !h || (!e && d) ? l : x(l, s, h, n, r),
              p = g ? (v || (e ? h : c || y) ? [] : t) : f;
            if ((g && g(f, p, n, r), y))
              for (o = x(p, u), y(o, [], n, r), i = o.length; i--; )
                (a = o[i]) && (p[u[i]] = !(f[u[i]] = a));
            if (e) {
              if (v || h) {
                if (v) {
                  for (o = [], i = p.length; i--; )
                    (a = p[i]) && o.push((f[i] = a));
                  v(null, (p = []), o, r);
                }
                for (i = p.length; i--; )
                  (a = p[i]) &&
                    -1 < (o = v ? $(e, a) : s[i]) &&
                    (e[o] = !(t[o] = a));
              }
            } else (p = x(p === t ? p.splice(c, p.length) : p)), v ? v(null, t, p, r) : Q.apply(t, p);
          })
        );
      }
      function g(e) {
        for (
          var o,
            t,
            n,
            r = e.length,
            i = A.relative[e[0].type],
            a = i || A.relative[" "],
            s = i ? 1 : 0,
            u = f(
              function (e) {
                return e === o;
              },
              a,
              !0
            ),
            c = f(
              function (e) {
                return -1 < $(o, e);
              },
              a,
              !0
            ),
            l = [
              function (e, t, n) {
                var r =
                  (!i && (n || t !== j)) ||
                  ((o = t).nodeType ? u(e, t, n) : c(e, t, n));
                return (o = null), r;
              },
            ];
          s < r;
          s++
        )
          if ((t = A.relative[e[s].type])) l = [f(p(l), t)];
          else {
            if ((t = A.filter[e[s].type].apply(null, e[s].matches))[F]) {
              for (n = ++s; n < r && !A.relative[e[n].type]; n++);
              return m(
                1 < s && p(l),
                1 < s &&
                  d(
                    e
                      .slice(0, s - 1)
                      .concat({ value: " " === e[s - 2].type ? "*" : "" })
                  ).replace(ae, "$1"),
                t,
                s < n && g(e.slice(s, n)),
                n < r && g((e = e.slice(n))),
                n < r && d(e)
              );
            }
            l.push(t);
          }
        return p(l);
      }
      var y,
        v,
        A,
        b,
        S,
        T,
        C,
        O,
        j,
        E,
        I,
        N,
        P,
        k,
        D,
        M,
        L,
        R,
        _,
        F = "sizzle" + 1 * new Date(),
        q = n.document,
        B = 0,
        W = 0,
        H = e(),
        U = e(),
        J = e(),
        G = e(),
        z = function (e, t) {
          return e === t && (I = !0), 0;
        },
        Y = {}.hasOwnProperty,
        V = [],
        X = V.pop,
        Z = V.push,
        Q = V.push,
        K = V.slice,
        $ = function (e, t) {
          for (var n = 0, r = e.length; n < r; n++) if (e[n] === t) return n;
          return -1;
        },
        ee =
          "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
        te = "[\\x20\\t\\r\\n\\f]",
        ne =
          "(?:\\\\[\\da-fA-F]{1,6}" +
          te +
          "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
        re =
          "\\[" +
          te +
          "*(" +
          ne +
          ")(?:" +
          te +
          "*([*^$|!~]?=)" +
          te +
          "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
          ne +
          "))|)" +
          te +
          "*\\]",
        oe =
          ":(" +
          ne +
          ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
          re +
          ")*)|.*)\\)|)",
        ie = new RegExp(te + "+", "g"),
        ae = new RegExp(
          "^" + te + "+|((?:^|[^\\\\])(?:\\\\.)*)" + te + "+$",
          "g"
        ),
        se = new RegExp("^" + te + "*," + te + "*"),
        ue = new RegExp("^" + te + "*([>+~]|" + te + ")" + te + "*"),
        ce = new RegExp(te + "|>"),
        le = new RegExp(oe),
        fe = new RegExp("^" + ne + "$"),
        pe = {
          ID: new RegExp("^#(" + ne + ")"),
          CLASS: new RegExp("^\\.(" + ne + ")"),
          TAG: new RegExp("^(" + ne + "|[*])"),
          ATTR: new RegExp("^" + re),
          PSEUDO: new RegExp("^" + oe),
          CHILD: new RegExp(
            "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
              te +
              "*(even|odd|(([+-]|)(\\d*)n|)" +
              te +
              "*(?:([+-]|)" +
              te +
              "*(\\d+)|))" +
              te +
              "*\\)|)",
            "i"
          ),
          bool: new RegExp("^(?:" + ee + ")$", "i"),
          needsContext: new RegExp(
            "^" +
              te +
              "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
              te +
              "*((?:-\\d)?\\d*)" +
              te +
              "*\\)|)(?=[^-]|$)",
            "i"
          ),
        },
        he = /HTML$/i,
        de = /^(?:input|select|textarea|button)$/i,
        ge = /^h\d$/i,
        ye = /^[^{]+\{\s*\[native \w/,
        ve = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
        me = /[+~]/,
        be = new RegExp(
          "\\\\[\\da-fA-F]{1,6}" + te + "?|\\\\([^\\r\\n\\f])",
          "g"
        ),
        we = function (e, t) {
          var n = "0x" + e.slice(1) - 65536;
          return (
            t ||
            (n < 0
              ? String.fromCharCode(n + 65536)
              : String.fromCharCode((n >> 10) | 55296, (1023 & n) | 56320))
          );
        },
        xe = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
        Ae = function (e, t) {
          return t
            ? "\0" === e
              ? "\ufffd"
              : e.slice(0, -1) +
                "\\" +
                e.charCodeAt(e.length - 1).toString(16) +
                " "
            : "\\" + e;
        },
        Se = function () {
          N();
        },
        Te = f(
          function (e) {
            return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase();
          },
          { dir: "parentNode", next: "legend" }
        );
      try {
        Q.apply((V = K.call(q.childNodes)), q.childNodes),
          V[q.childNodes.length].nodeType;
      } catch (y) {
        Q = {
          apply: V.length
            ? function (e, t) {
                Z.apply(e, K.call(t));
              }
            : function (e, t) {
                for (var n = e.length, r = 0; (e[n++] = t[r++]); );
                e.length = n - 1;
              },
        };
      }
      for (y in ((v = w.support = {}),
      (S = w.isXML =
        function (e) {
          var t = e.namespaceURI,
            n = (e.ownerDocument || e).documentElement;
          return !he.test(t || (n && n.nodeName) || "HTML");
        }),
      (N = w.setDocument =
        function (e) {
          var t,
            n,
            r = e ? e.ownerDocument || e : q;
          return (
            r != P &&
              9 === r.nodeType &&
              r.documentElement &&
              ((k = (P = r).documentElement),
              (D = !S(P)),
              q != P &&
                (n = P.defaultView) &&
                n.top !== n &&
                (n.addEventListener
                  ? n.addEventListener("unload", Se, !1)
                  : n.attachEvent && n.attachEvent("onunload", Se)),
              (v.scope = o(function (e) {
                return (
                  k.appendChild(e).appendChild(P.createElement("div")),
                  "undefined" != typeof e.querySelectorAll &&
                    !e.querySelectorAll(":scope fieldset div").length
                );
              })),
              (v.attributes = o(function (e) {
                return (e.className = "i"), !e.getAttribute("className");
              })),
              (v.getElementsByTagName = o(function (e) {
                return (
                  e.appendChild(P.createComment("")),
                  !e.getElementsByTagName("*").length
                );
              })),
              (v.getElementsByClassName = ye.test(P.getElementsByClassName)),
              (v.getById = o(function (e) {
                return (
                  (k.appendChild(e).id = F),
                  !P.getElementsByName || !P.getElementsByName(F).length
                );
              })),
              v.getById
                ? ((A.filter.ID = function (e) {
                    var t = e.replace(be, we);
                    return function (e) {
                      return e.getAttribute("id") === t;
                    };
                  }),
                  (A.find.ID = function (e, t) {
                    if ("undefined" != typeof t.getElementById && D) {
                      var n = t.getElementById(e);
                      return n ? [n] : [];
                    }
                  }))
                : ((A.filter.ID = function (e) {
                    var n = e.replace(be, we);
                    return function (e) {
                      var t =
                        "undefined" != typeof e.getAttributeNode &&
                        e.getAttributeNode("id");
                      return t && t.value === n;
                    };
                  }),
                  (A.find.ID = function (e, t) {
                    if ("undefined" != typeof t.getElementById && D) {
                      var n,
                        r,
                        o,
                        i = t.getElementById(e);
                      if (i) {
                        if ((n = i.getAttributeNode("id")) && n.value === e)
                          return [i];
                        for (o = t.getElementsByName(e), r = 0; (i = o[r++]); )
                          if ((n = i.getAttributeNode("id")) && n.value === e)
                            return [i];
                      }
                      return [];
                    }
                  })),
              (A.find.TAG = v.getElementsByTagName
                ? function (e, t) {
                    return "undefined" != typeof t.getElementsByTagName
                      ? t.getElementsByTagName(e)
                      : v.qsa
                      ? t.querySelectorAll(e)
                      : void 0;
                  }
                : function (e, t) {
                    var n,
                      r = [],
                      o = 0,
                      i = t.getElementsByTagName(e);
                    if ("*" !== e) return i;
                    for (; (n = i[o++]); ) 1 === n.nodeType && r.push(n);
                    return r;
                  }),
              (A.find.CLASS =
                v.getElementsByClassName &&
                function (e, t) {
                  if ("undefined" != typeof t.getElementsByClassName && D)
                    return t.getElementsByClassName(e);
                }),
              (L = []),
              (M = []),
              (v.qsa = ye.test(P.querySelectorAll)) &&
                (o(function (e) {
                  var t;
                  (k.appendChild(e).innerHTML =
                    "<a id='" +
                    F +
                    "'></a><select id='" +
                    F +
                    "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                    e.querySelectorAll("[msallowcapture^='']").length &&
                      M.push("[*^$]=" + te + "*(?:''|\"\")"),
                    e.querySelectorAll("[selected]").length ||
                      M.push("\\[" + te + "*(?:value|" + ee + ")"),
                    e.querySelectorAll("[id~=" + F + "-]").length ||
                      M.push("~="),
                    (t = P.createElement("input")).setAttribute("name", ""),
                    e.appendChild(t),
                    e.querySelectorAll("[name='']").length ||
                      M.push(
                        "\\[" + te + "*name" + te + "*=" + te + "*(?:''|\"\")"
                      ),
                    e.querySelectorAll(":checked").length || M.push(":checked"),
                    e.querySelectorAll("a#" + F + "+*").length ||
                      M.push(".#.+[+~]"),
                    e.querySelectorAll("\\\f"),
                    M.push("[\\r\\n\\f]");
                }),
                o(function (e) {
                  e.innerHTML =
                    "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                  var t = P.createElement("input");
                  t.setAttribute("type", "hidden"),
                    e.appendChild(t).setAttribute("name", "D"),
                    e.querySelectorAll("[name=d]").length &&
                      M.push("name" + te + "*[*^$|!~]?="),
                    2 !== e.querySelectorAll(":enabled").length &&
                      M.push(":enabled", ":disabled"),
                    (k.appendChild(e).disabled = !0),
                    2 !== e.querySelectorAll(":disabled").length &&
                      M.push(":enabled", ":disabled"),
                    e.querySelectorAll("*,:x"),
                    M.push(",.*:");
                })),
              (v.matchesSelector = ye.test(
                (R =
                  k.matches ||
                  k.webkitMatchesSelector ||
                  k.mozMatchesSelector ||
                  k.oMatchesSelector ||
                  k.msMatchesSelector)
              )) &&
                o(function (e) {
                  (v.disconnectedMatch = R.call(e, "*")),
                    R.call(e, "[s!='']:x"),
                    L.push("!=", oe);
                }),
              (M = M.length && new RegExp(M.join("|"))),
              (L = L.length && new RegExp(L.join("|"))),
              (t = ye.test(k.compareDocumentPosition)),
              (_ =
                t || ye.test(k.contains)
                  ? function (e, t) {
                      var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                      return (
                        e === r ||
                        !(
                          !r ||
                          1 !== r.nodeType ||
                          !(n.contains
                            ? n.contains(r)
                            : e.compareDocumentPosition &&
                              16 & e.compareDocumentPosition(r))
                        )
                      );
                    }
                  : function (e, t) {
                      if (t)
                        for (; (t = t.parentNode); ) if (t === e) return !0;
                      return !1;
                    }),
              (z = t
                ? function (e, t) {
                    if (e === t) return (I = !0), 0;
                    var n =
                      !e.compareDocumentPosition - !t.compareDocumentPosition;
                    return (
                      n ||
                      (1 &
                        (n =
                          (e.ownerDocument || e) == (t.ownerDocument || t)
                            ? e.compareDocumentPosition(t)
                            : 1) ||
                      (!v.sortDetached && t.compareDocumentPosition(e) === n)
                        ? e == P || (e.ownerDocument == q && _(q, e))
                          ? -1
                          : t == P || (t.ownerDocument == q && _(q, t))
                          ? 1
                          : E
                          ? $(E, e) - $(E, t)
                          : 0
                        : 4 & n
                        ? -1
                        : 1)
                    );
                  }
                : function (e, t) {
                    if (e === t) return (I = !0), 0;
                    var n,
                      r = 0,
                      o = e.parentNode,
                      i = t.parentNode,
                      a = [e],
                      s = [t];
                    if (!o || !i)
                      return e == P
                        ? -1
                        : t == P
                        ? 1
                        : o
                        ? -1
                        : i
                        ? 1
                        : E
                        ? $(E, e) - $(E, t)
                        : 0;
                    if (o === i) return c(e, t);
                    for (n = e; (n = n.parentNode); ) a.unshift(n);
                    for (n = t; (n = n.parentNode); ) s.unshift(n);
                    for (; a[r] === s[r]; ) r++;
                    return r
                      ? c(a[r], s[r])
                      : a[r] == q
                      ? -1
                      : s[r] == q
                      ? 1
                      : 0;
                  })),
            P
          );
        }),
      (w.matches = function (e, t) {
        return w(e, null, null, t);
      }),
      (w.matchesSelector = function (e, t) {
        if (
          (N(e),
          v.matchesSelector &&
            D &&
            !G[t + " "] &&
            (!L || !L.test(t)) &&
            (!M || !M.test(t)))
        )
          try {
            var n = R.call(e, t);
            if (
              n ||
              v.disconnectedMatch ||
              (e.document && 11 !== e.document.nodeType)
            )
              return n;
          } catch (e) {
            G(t, !0);
          }
        return 0 < w(t, P, null, [e]).length;
      }),
      (w.contains = function (e, t) {
        return (e.ownerDocument || e) != P && N(e), _(e, t);
      }),
      (w.attr = function (e, t) {
        (e.ownerDocument || e) != P && N(e);
        var n = A.attrHandle[t.toLowerCase()],
          r = n && Y.call(A.attrHandle, t.toLowerCase()) ? n(e, t, !D) : void 0;
        return void 0 !== r
          ? r
          : v.attributes || !D
          ? e.getAttribute(t)
          : (r = e.getAttributeNode(t)) && r.specified
          ? r.value
          : null;
      }),
      (w.escape = function (e) {
        return (e + "").replace(xe, Ae);
      }),
      (w.error = function (e) {
        throw new Error("Syntax error, unrecognized expression: " + e);
      }),
      (w.uniqueSort = function (e) {
        var t,
          n = [],
          r = 0,
          o = 0;
        if (
          ((I = !v.detectDuplicates),
          (E = !v.sortStable && e.slice(0)),
          e.sort(z),
          I)
        ) {
          for (; (t = e[o++]); ) t === e[o] && (r = n.push(o));
          for (; r--; ) e.splice(n[r], 1);
        }
        return (E = null), e;
      }),
      (b = w.getText =
        function (e) {
          var t,
            n = "",
            r = 0,
            o = e.nodeType;
          if (o) {
            if (1 === o || 9 === o || 11 === o) {
              if ("string" == typeof e.textContent) return e.textContent;
              for (e = e.firstChild; e; e = e.nextSibling) n += b(e);
            } else if (3 === o || 4 === o) return e.nodeValue;
          } else for (; (t = e[r++]); ) n += b(t);
          return n;
        }),
      ((A = w.selectors =
        {
          cacheLength: 50,
          createPseudo: u,
          match: pe,
          attrHandle: {},
          find: {},
          relative: {
            ">": { dir: "parentNode", first: !0 },
            " ": { dir: "parentNode" },
            "+": { dir: "previousSibling", first: !0 },
            "~": { dir: "previousSibling" },
          },
          preFilter: {
            ATTR: function (e) {
              return (
                (e[1] = e[1].replace(be, we)),
                (e[3] = (e[3] || e[4] || e[5] || "").replace(be, we)),
                "~=" === e[2] && (e[3] = " " + e[3] + " "),
                e.slice(0, 4)
              );
            },
            CHILD: function (e) {
              return (
                (e[1] = e[1].toLowerCase()),
                "nth" === e[1].slice(0, 3)
                  ? (e[3] || w.error(e[0]),
                    (e[4] = +(e[4]
                      ? e[5] + (e[6] || 1)
                      : 2 * ("even" === e[3] || "odd" === e[3]))),
                    (e[5] = +(e[7] + e[8] || "odd" === e[3])))
                  : e[3] && w.error(e[0]),
                e
              );
            },
            PSEUDO: function (e) {
              var t,
                n = !e[6] && e[2];
              return pe.CHILD.test(e[0])
                ? null
                : (e[3]
                    ? (e[2] = e[4] || e[5] || "")
                    : n &&
                      le.test(n) &&
                      (t = T(n, !0)) &&
                      (t = n.indexOf(")", n.length - t) - n.length) &&
                      ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))),
                  e.slice(0, 3));
            },
          },
          filter: {
            TAG: function (e) {
              var t = e.replace(be, we).toLowerCase();
              return "*" === e
                ? function () {
                    return !0;
                  }
                : function (e) {
                    return e.nodeName && e.nodeName.toLowerCase() === t;
                  };
            },
            CLASS: function (e) {
              var t = H[e + " "];
              return (
                t ||
                ((t = new RegExp("(^|" + te + ")" + e + "(" + te + "|$)")) &&
                  H(e, function (e) {
                    return t.test(
                      ("string" == typeof e.className && e.className) ||
                        ("undefined" != typeof e.getAttribute &&
                          e.getAttribute("class")) ||
                        ""
                    );
                  }))
              );
            },
            ATTR: function (n, r, o) {
              return function (e) {
                var t = w.attr(e, n);
                return null == t
                  ? "!=" === r
                  : !r ||
                      ((t += ""),
                      "=" === r
                        ? t === o
                        : "!=" === r
                        ? t !== o
                        : "^=" === r
                        ? o && 0 === t.indexOf(o)
                        : "*=" === r
                        ? o && -1 < t.indexOf(o)
                        : "$=" === r
                        ? o && t.slice(-o.length) === o
                        : "~=" === r
                        ? -1 < (" " + t.replace(ie, " ") + " ").indexOf(o)
                        : "|=" === r &&
                          (t === o || t.slice(0, o.length + 1) === o + "-"));
              };
            },
            CHILD: function (d, e, t, g, y) {
              var v = "nth" !== d.slice(0, 3),
                m = "last" !== d.slice(-4),
                b = "of-type" === e;
              return 1 === g && 0 === y
                ? function (e) {
                    return !!e.parentNode;
                  }
                : function (e, t, n) {
                    var r,
                      o,
                      i,
                      a,
                      s,
                      u,
                      c = v !== m ? "nextSibling" : "previousSibling",
                      l = e.parentNode,
                      f = b && e.nodeName.toLowerCase(),
                      p = !n && !b,
                      h = !1;
                    if (l) {
                      if (v) {
                        for (; c; ) {
                          for (a = e; (a = a[c]); )
                            if (
                              b
                                ? a.nodeName.toLowerCase() === f
                                : 1 === a.nodeType
                            )
                              return !1;
                          u = c = "only" === d && !u && "nextSibling";
                        }
                        return !0;
                      }
                      if (((u = [m ? l.firstChild : l.lastChild]), m && p)) {
                        for (
                          h =
                            (s =
                              (r =
                                (o =
                                  (i = (a = l)[F] || (a[F] = {}))[a.uniqueID] ||
                                  (i[a.uniqueID] = {}))[d] || [])[0] === B &&
                              r[1]) && r[2],
                            a = s && l.childNodes[s];
                          (a = (++s && a && a[c]) || (h = s = 0) || u.pop());

                        )
                          if (1 === a.nodeType && ++h && a === e) {
                            o[d] = [B, s, h];
                            break;
                          }
                      } else if (
                        (p &&
                          (h = s =
                            (r =
                              (o =
                                (i = (a = e)[F] || (a[F] = {}))[a.uniqueID] ||
                                (i[a.uniqueID] = {}))[d] || [])[0] === B &&
                            r[1]),
                        !1 === h)
                      )
                        for (
                          ;
                          (a = (++s && a && a[c]) || (h = s = 0) || u.pop()) &&
                          ((b
                            ? a.nodeName.toLowerCase() !== f
                            : 1 !== a.nodeType) ||
                            !++h ||
                            (p &&
                              ((o =
                                (i = a[F] || (a[F] = {}))[a.uniqueID] ||
                                (i[a.uniqueID] = {}))[d] = [B, h]),
                            a !== e));

                        );
                      return (h -= y) === g || (h % g == 0 && 0 <= h / g);
                    }
                  };
            },
            PSEUDO: function (e, i) {
              var t,
                a =
                  A.pseudos[e] ||
                  A.setFilters[e.toLowerCase()] ||
                  w.error("unsupported pseudo: " + e);
              return a[F]
                ? a(i)
                : 1 < a.length
                ? ((t = [e, e, "", i]),
                  A.setFilters.hasOwnProperty(e.toLowerCase())
                    ? u(function (e, t) {
                        for (var n, r = a(e, i), o = r.length; o--; )
                          e[(n = $(e, r[o]))] = !(t[n] = r[o]);
                      })
                    : function (e) {
                        return a(e, 0, t);
                      })
                : a;
            },
          },
          pseudos: {
            not: u(function (e) {
              var r = [],
                o = [],
                s = C(e.replace(ae, "$1"));
              return s[F]
                ? u(function (e, t, n, r) {
                    for (var o, i = s(e, null, r, []), a = e.length; a--; )
                      (o = i[a]) && (e[a] = !(t[a] = o));
                  })
                : function (e, t, n) {
                    return (
                      (r[0] = e), s(r, null, n, o), (r[0] = null), !o.pop()
                    );
                  };
            }),
            has: u(function (t) {
              return function (e) {
                return 0 < w(t, e).length;
              };
            }),
            contains: u(function (t) {
              return (
                (t = t.replace(be, we)),
                function (e) {
                  return -1 < (e.textContent || b(e)).indexOf(t);
                }
              );
            }),
            lang: u(function (n) {
              return (
                fe.test(n || "") || w.error("unsupported lang: " + n),
                (n = n.replace(be, we).toLowerCase()),
                function (e) {
                  var t;
                  do {
                    if (
                      (t = D
                        ? e.lang
                        : e.getAttribute("xml:lang") || e.getAttribute("lang"))
                    )
                      return (
                        (t = t.toLowerCase()) === n || 0 === t.indexOf(n + "-")
                      );
                  } while ((e = e.parentNode) && 1 === e.nodeType);
                  return !1;
                }
              );
            }),
            target: function (e) {
              var t = n.location && n.location.hash;
              return t && t.slice(1) === e.id;
            },
            root: function (e) {
              return e === k;
            },
            focus: function (e) {
              return (
                e === P.activeElement &&
                (!P.hasFocus || P.hasFocus()) &&
                !!(e.type || e.href || ~e.tabIndex)
              );
            },
            enabled: a(!1),
            disabled: a(!0),
            checked: function (e) {
              var t = e.nodeName.toLowerCase();
              return (
                ("input" === t && !!e.checked) ||
                ("option" === t && !!e.selected)
              );
            },
            selected: function (e) {
              return (
                e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
              );
            },
            empty: function (e) {
              for (e = e.firstChild; e; e = e.nextSibling)
                if (e.nodeType < 6) return !1;
              return !0;
            },
            parent: function (e) {
              return !A.pseudos.empty(e);
            },
            header: function (e) {
              return ge.test(e.nodeName);
            },
            input: function (e) {
              return de.test(e.nodeName);
            },
            button: function (e) {
              var t = e.nodeName.toLowerCase();
              return ("input" === t && "button" === e.type) || "button" === t;
            },
            text: function (e) {
              var t;
              return (
                "input" === e.nodeName.toLowerCase() &&
                "text" === e.type &&
                (null == (t = e.getAttribute("type")) ||
                  "text" === t.toLowerCase())
              );
            },
            first: s(function () {
              return [0];
            }),
            last: s(function (e, t) {
              return [t - 1];
            }),
            eq: s(function (e, t, n) {
              return [n < 0 ? n + t : n];
            }),
            even: s(function (e, t) {
              for (var n = 0; n < t; n += 2) e.push(n);
              return e;
            }),
            odd: s(function (e, t) {
              for (var n = 1; n < t; n += 2) e.push(n);
              return e;
            }),
            lt: s(function (e, t, n) {
              for (var r = n < 0 ? n + t : t < n ? t : n; 0 <= --r; ) e.push(r);
              return e;
            }),
            gt: s(function (e, t, n) {
              for (var r = n < 0 ? n + t : n; ++r < t; ) e.push(r);
              return e;
            }),
          },
        }).pseudos.nth = A.pseudos.eq),
      { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
        A.pseudos[y] = r(y);
      for (y in { submit: !0, reset: !0 }) A.pseudos[y] = i(y);
      return (
        (l.prototype = A.filters = A.pseudos),
        (A.setFilters = new l()),
        (T = w.tokenize =
          function (e, t) {
            var n,
              r,
              o,
              i,
              a,
              s,
              u,
              c = U[e + " "];
            if (c) return t ? 0 : c.slice(0);
            for (a = e, s = [], u = A.preFilter; a; ) {
              for (i in ((n && !(r = se.exec(a))) ||
                (r && (a = a.slice(r[0].length) || a), s.push((o = []))),
              (n = !1),
              (r = ue.exec(a)) &&
                ((n = r.shift()),
                o.push({ value: n, type: r[0].replace(ae, " ") }),
                (a = a.slice(n.length))),
              A.filter))
                !(r = pe[i].exec(a)) ||
                  (u[i] && !(r = u[i](r))) ||
                  ((n = r.shift()),
                  o.push({ value: n, type: i, matches: r }),
                  (a = a.slice(n.length)));
              if (!n) break;
            }
            return t ? a.length : a ? w.error(e) : U(e, s).slice(0);
          }),
        (C = w.compile =
          function (e, t) {
            var n,
              y,
              v,
              m,
              b,
              r,
              o = [],
              i = [],
              a = J[e + " "];
            if (!a) {
              for (t || (t = T(e)), n = t.length; n--; )
                (a = g(t[n]))[F] ? o.push(a) : i.push(a);
              (a = J(
                e,
                ((y = i),
                (m = 0 < (v = o).length),
                (b = 0 < y.length),
                (r = function (e, t, n, r, o) {
                  var i,
                    a,
                    s,
                    u = 0,
                    c = "0",
                    l = e && [],
                    f = [],
                    p = j,
                    h = e || (b && A.find.TAG("*", o)),
                    d = (B += null == p ? 1 : Math.random() || 0.1),
                    g = h.length;
                  for (
                    o && (j = t == P || t || o);
                    c !== g && null != (i = h[c]);
                    c++
                  ) {
                    if (b && i) {
                      for (
                        a = 0, t || i.ownerDocument == P || (N(i), (n = !D));
                        (s = y[a++]);

                      )
                        if (s(i, t || P, n)) {
                          r.push(i);
                          break;
                        }
                      o && (B = d);
                    }
                    m && ((i = !s && i) && u--, e && l.push(i));
                  }
                  if (((u += c), m && c !== u)) {
                    for (a = 0; (s = v[a++]); ) s(l, f, t, n);
                    if (e) {
                      if (0 < u)
                        for (; c--; ) l[c] || f[c] || (f[c] = X.call(r));
                      f = x(f);
                    }
                    Q.apply(r, f),
                      o &&
                        !e &&
                        0 < f.length &&
                        1 < u + v.length &&
                        w.uniqueSort(r);
                  }
                  return o && ((B = d), (j = p)), l;
                }),
                m ? u(r) : r)
              )).selector = e;
            }
            return a;
          }),
        (O = w.select =
          function (e, t, n, r) {
            var o,
              i,
              a,
              s,
              u,
              c = "function" == typeof e && e,
              l = !r && T((e = c.selector || e));
            if (((n = n || []), 1 === l.length)) {
              if (
                2 < (i = l[0] = l[0].slice(0)).length &&
                "ID" === (a = i[0]).type &&
                9 === t.nodeType &&
                D &&
                A.relative[i[1].type]
              ) {
                if (
                  !(t = (A.find.ID(a.matches[0].replace(be, we), t) || [])[0])
                )
                  return n;
                c && (t = t.parentNode), (e = e.slice(i.shift().value.length));
              }
              for (
                o = pe.needsContext.test(e) ? 0 : i.length;
                o-- && ((a = i[o]), !A.relative[(s = a.type)]);

              )
                if (
                  (u = A.find[s]) &&
                  (r = u(
                    a.matches[0].replace(be, we),
                    (me.test(i[0].type) && h(t.parentNode)) || t
                  ))
                ) {
                  if ((i.splice(o, 1), !(e = r.length && d(i))))
                    return Q.apply(n, r), n;
                  break;
                }
            }
            return (
              (c || C(e, l))(
                r,
                t,
                !D,
                n,
                !t || (me.test(e) && h(t.parentNode)) || t
              ),
              n
            );
          }),
        (v.sortStable = F.split("").sort(z).join("") === F),
        (v.detectDuplicates = !!I),
        N(),
        (v.sortDetached = o(function (e) {
          return 1 & e.compareDocumentPosition(P.createElement("fieldset"));
        })),
        o(function (e) {
          return (
            (e.innerHTML = "<a href='#'></a>"),
            "#" === e.firstChild.getAttribute("href")
          );
        }) ||
          t("type|href|height|width", function (e, t, n) {
            if (!n)
              return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
          }),
        (v.attributes &&
          o(function (e) {
            return (
              (e.innerHTML = "<input/>"),
              e.firstChild.setAttribute("value", ""),
              "" === e.firstChild.getAttribute("value")
            );
          })) ||
          t("value", function (e, t, n) {
            if (!n && "input" === e.nodeName.toLowerCase())
              return e.defaultValue;
          }),
        o(function (e) {
          return null == e.getAttribute("disabled");
        }) ||
          t(ee, function (e, t, n) {
            var r;
            if (!n)
              return !0 === e[t]
                ? t.toLowerCase()
                : (r = e.getAttributeNode(t)) && r.specified
                ? r.value
                : null;
          }),
        w
      );
    })(S);
    (de.find = ge),
      (de.expr = ge.selectors),
      (de.expr[":"] = de.expr.pseudos),
      (de.uniqueSort = de.unique = ge.uniqueSort),
      (de.text = ge.getText),
      (de.isXMLDoc = ge.isXML),
      (de.contains = ge.contains),
      (de.escapeSelector = ge.escape);
    var ye = function (e, t, n) {
        for (var r = [], o = void 0 !== n; (e = e[t]) && 9 !== e.nodeType; )
          if (1 === e.nodeType) {
            if (o && de(e).is(n)) break;
            r.push(e);
          }
        return r;
      },
      ve = function (e, t) {
        for (var n = []; e; e = e.nextSibling)
          1 === e.nodeType && e !== t && n.push(e);
        return n;
      },
      me = de.expr.match.needsContext,
      be = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
    (de.filter = function (e, t, n) {
      var r = t[0];
      return (
        n && (e = ":not(" + e + ")"),
        1 === t.length && 1 === r.nodeType
          ? de.find.matchesSelector(r, e)
            ? [r]
            : []
          : de.find.matches(
              e,
              de.grep(t, function (e) {
                return 1 === e.nodeType;
              })
            )
      );
    }),
      de.fn.extend({
        find: function (e) {
          var t,
            n,
            r = this.length,
            o = this;
          if ("string" != typeof e)
            return this.pushStack(
              de(e).filter(function () {
                for (t = 0; t < r; t++) if (de.contains(o[t], this)) return !0;
              })
            );
          for (n = this.pushStack([]), t = 0; t < r; t++) de.find(e, o[t], n);
          return 1 < r ? de.uniqueSort(n) : n;
        },
        filter: function (e) {
          return this.pushStack(t(this, e || [], !1));
        },
        not: function (e) {
          return this.pushStack(t(this, e || [], !0));
        },
        is: function (e) {
          return !!t(
            this,
            "string" == typeof e && me.test(e) ? de(e) : e || [],
            !1
          ).length;
        },
      });
    var we,
      xe = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    ((de.fn.init = function (e, t, n) {
      var r, o;
      if (!e) return this;
      if (((n = n || we), "string" != typeof e))
        return e.nodeType
          ? ((this[0] = e), (this.length = 1), this)
          : ce(e)
          ? void 0 !== n.ready
            ? n.ready(e)
            : e(de)
          : de.makeArray(e, this);
      if (
        !(r =
          "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length
            ? [null, e, null]
            : xe.exec(e)) ||
        (!r[1] && t)
      )
        return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
      if (r[1]) {
        if (
          ((t = t instanceof de ? t[0] : t),
          de.merge(
            this,
            de.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : fe, !0)
          ),
          be.test(r[1]) && de.isPlainObject(t))
        )
          for (r in t) ce(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
        return this;
      }
      return (
        (o = fe.getElementById(r[2])) && ((this[0] = o), (this.length = 1)),
        this
      );
    }).prototype = de.fn),
      (we = de(fe));
    var Ae = /^(?:parents|prev(?:Until|All))/,
      Se = { children: !0, contents: !0, next: !0, prev: !0 };
    de.fn.extend({
      has: function (e) {
        var t = de(e, this),
          n = t.length;
        return this.filter(function () {
          for (var e = 0; e < n; e++) if (de.contains(this, t[e])) return !0;
        });
      },
      closest: function (e, t) {
        var n,
          r = 0,
          o = this.length,
          i = [],
          a = "string" != typeof e && de(e);
        if (!me.test(e))
          for (; r < o; r++)
            for (n = this[r]; n && n !== t; n = n.parentNode)
              if (
                n.nodeType < 11 &&
                (a
                  ? -1 < a.index(n)
                  : 1 === n.nodeType && de.find.matchesSelector(n, e))
              ) {
                i.push(n);
                break;
              }
        return this.pushStack(1 < i.length ? de.uniqueSort(i) : i);
      },
      index: function (e) {
        return e
          ? "string" == typeof e
            ? ne.call(de(e), this[0])
            : ne.call(this, e.jquery ? e[0] : e)
          : this[0] && this[0].parentNode
          ? this.first().prevAll().length
          : -1;
      },
      add: function (e, t) {
        return this.pushStack(de.uniqueSort(de.merge(this.get(), de(e, t))));
      },
      addBack: function (e) {
        return this.add(
          null == e ? this.prevObject : this.prevObject.filter(e)
        );
      },
    }),
      de.each(
        {
          parent: function (e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null;
          },
          parents: function (e) {
            return ye(e, "parentNode");
          },
          parentsUntil: function (e, t, n) {
            return ye(e, "parentNode", n);
          },
          next: function (e) {
            return n(e, "nextSibling");
          },
          prev: function (e) {
            return n(e, "previousSibling");
          },
          nextAll: function (e) {
            return ye(e, "nextSibling");
          },
          prevAll: function (e) {
            return ye(e, "previousSibling");
          },
          nextUntil: function (e, t, n) {
            return ye(e, "nextSibling", n);
          },
          prevUntil: function (e, t, n) {
            return ye(e, "previousSibling", n);
          },
          siblings: function (e) {
            return ve((e.parentNode || {}).firstChild, e);
          },
          children: function (e) {
            return ve(e.firstChild);
          },
          contents: function (e) {
            return null != e.contentDocument && K(e.contentDocument)
              ? e.contentDocument
              : (c(e, "template") && (e = e.content || e),
                de.merge([], e.childNodes));
          },
        },
        function (r, o) {
          de.fn[r] = function (e, t) {
            var n = de.map(this, o, e);
            return (
              "Until" !== r.slice(-5) && (t = e),
              t && "string" == typeof t && (n = de.filter(t, n)),
              1 < this.length &&
                (Se[r] || de.uniqueSort(n), Ae.test(r) && n.reverse()),
              this.pushStack(n)
            );
          };
        }
      );
    var Te = /[^\x20\t\r\n\f]+/g;
    (de.Callbacks = function (r) {
      var e, n;
      r =
        "string" == typeof r
          ? ((e = r),
            (n = {}),
            de.each(e.match(Te) || [], function (e, t) {
              n[t] = !0;
            }),
            n)
          : de.extend({}, r);
      var o,
        t,
        i,
        a,
        s = [],
        u = [],
        c = -1,
        l = function () {
          for (a = a || r.once, i = o = !0; u.length; c = -1)
            for (t = u.shift(); ++c < s.length; )
              !1 === s[c].apply(t[0], t[1]) &&
                r.stopOnFalse &&
                ((c = s.length), (t = !1));
          r.memory || (t = !1), (o = !1), a && (s = t ? [] : "");
        },
        f = {
          add: function () {
            return (
              s &&
                (t && !o && ((c = s.length - 1), u.push(t)),
                (function n(e) {
                  de.each(e, function (e, t) {
                    ce(t)
                      ? (r.unique && f.has(t)) || s.push(t)
                      : t && t.length && "string" !== y(t) && n(t);
                  });
                })(arguments),
                t && !o && l()),
              this
            );
          },
          remove: function () {
            return (
              de.each(arguments, function (e, t) {
                for (var n; -1 < (n = de.inArray(t, s, n)); )
                  s.splice(n, 1), n <= c && c--;
              }),
              this
            );
          },
          has: function (e) {
            return e ? -1 < de.inArray(e, s) : 0 < s.length;
          },
          empty: function () {
            return s && (s = []), this;
          },
          disable: function () {
            return (a = u = []), (s = t = ""), this;
          },
          disabled: function () {
            return !s;
          },
          lock: function () {
            return (a = u = []), t || o || (s = t = ""), this;
          },
          locked: function () {
            return !!a;
          },
          fireWith: function (e, t) {
            return (
              a ||
                ((t = [e, (t = t || []).slice ? t.slice() : t]),
                u.push(t),
                o || l()),
              this
            );
          },
          fire: function () {
            return f.fireWith(this, arguments), this;
          },
          fired: function () {
            return !!i;
          },
        };
      return f;
    }),
      de.extend({
        Deferred: function (e) {
          var i = [
              [
                "notify",
                "progress",
                de.Callbacks("memory"),
                de.Callbacks("memory"),
                2,
              ],
              [
                "resolve",
                "done",
                de.Callbacks("once memory"),
                de.Callbacks("once memory"),
                0,
                "resolved",
              ],
              [
                "reject",
                "fail",
                de.Callbacks("once memory"),
                de.Callbacks("once memory"),
                1,
                "rejected",
              ],
            ],
            o = "pending",
            a = {
              state: function () {
                return o;
              },
              always: function () {
                return s.done(arguments).fail(arguments), this;
              },
              catch: function (e) {
                return a.then(null, e);
              },
              pipe: function () {
                var o = arguments;
                return de
                  .Deferred(function (r) {
                    de.each(i, function (e, t) {
                      var n = ce(o[t[4]]) && o[t[4]];
                      s[t[1]](function () {
                        var e = n && n.apply(this, arguments);
                        e && ce(e.promise)
                          ? e
                              .promise()
                              .progress(r.notify)
                              .done(r.resolve)
                              .fail(r.reject)
                          : r[t[0] + "With"](this, n ? [e] : arguments);
                      });
                    }),
                      (o = null);
                  })
                  .promise();
              },
              then: function (t, n, r) {
                function u(o, i, a, s) {
                  return function () {
                    var n = this,
                      r = arguments,
                      e = function () {
                        var e, t;
                        if (!(o < c)) {
                          if ((e = a.apply(n, r)) === i.promise())
                            throw new TypeError("Thenable self-resolution");
                          (t =
                            e &&
                            ("object" == typeof e || "function" == typeof e) &&
                            e.then),
                            ce(t)
                              ? s
                                ? t.call(e, u(c, i, l, s), u(c, i, f, s))
                                : (c++,
                                  t.call(
                                    e,
                                    u(c, i, l, s),
                                    u(c, i, f, s),
                                    u(c, i, l, i.notifyWith)
                                  ))
                              : (a !== l && ((n = void 0), (r = [e])),
                                (s || i.resolveWith)(n, r));
                        }
                      },
                      t = s
                        ? e
                        : function () {
                            try {
                              e();
                            } catch (e) {
                              de.Deferred.exceptionHook &&
                                de.Deferred.exceptionHook(e, t.stackTrace),
                                c <= o + 1 &&
                                  (a !== f && ((n = void 0), (r = [e])),
                                  i.rejectWith(n, r));
                            }
                          };
                    o
                      ? t()
                      : (de.Deferred.getStackHook &&
                          (t.stackTrace = de.Deferred.getStackHook()),
                        S.setTimeout(t));
                  };
                }
                var c = 0;
                return de
                  .Deferred(function (e) {
                    i[0][3].add(u(0, e, ce(r) ? r : l, e.notifyWith)),
                      i[1][3].add(u(0, e, ce(t) ? t : l)),
                      i[2][3].add(u(0, e, ce(n) ? n : f));
                  })
                  .promise();
              },
              promise: function (e) {
                return null != e ? de.extend(e, a) : a;
              },
            },
            s = {};
          return (
            de.each(i, function (e, t) {
              var n = t[2],
                r = t[5];
              (a[t[1]] = n.add),
                r &&
                  n.add(
                    function () {
                      o = r;
                    },
                    i[3 - e][2].disable,
                    i[3 - e][3].disable,
                    i[0][2].lock,
                    i[0][3].lock
                  ),
                n.add(t[3].fire),
                (s[t[0]] = function () {
                  return (
                    s[t[0] + "With"](this === s ? void 0 : this, arguments),
                    this
                  );
                }),
                (s[t[0] + "With"] = n.fireWith);
            }),
            a.promise(s),
            e && e.call(s, s),
            s
          );
        },
        when: function (e) {
          var n = arguments.length,
            t = n,
            r = Array(t),
            o = $.call(arguments),
            i = de.Deferred(),
            a = function (t) {
              return function (e) {
                (r[t] = this),
                  (o[t] = 1 < arguments.length ? $.call(arguments) : e),
                  --n || i.resolveWith(r, o);
              };
            };
          if (
            n <= 1 &&
            (u(e, i.done(a(t)).resolve, i.reject, !n),
            "pending" === i.state() || ce(o[t] && o[t].then))
          )
            return i.then();
          for (; t--; ) u(o[t], a(t), i.reject);
          return i.promise();
        },
      });
    var Ce = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    (de.Deferred.exceptionHook = function (e, t) {
      S.console &&
        S.console.warn &&
        e &&
        Ce.test(e.name) &&
        S.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t);
    }),
      (de.readyException = function (e) {
        S.setTimeout(function () {
          throw e;
        });
      });
    var Oe = de.Deferred();
    (de.fn.ready = function (e) {
      return (
        Oe.then(e)["catch"](function (e) {
          de.readyException(e);
        }),
        this
      );
    }),
      de.extend({
        isReady: !1,
        readyWait: 1,
        ready: function (e) {
          (!0 === e ? --de.readyWait : de.isReady) ||
            ((de.isReady = !0) !== e && 0 < --de.readyWait) ||
            Oe.resolveWith(fe, [de]);
        },
      }),
      (de.ready.then = Oe.then),
      "complete" === fe.readyState ||
      ("loading" !== fe.readyState && !fe.documentElement.doScroll)
        ? S.setTimeout(de.ready)
        : (fe.addEventListener("DOMContentLoaded", r),
          S.addEventListener("load", r));
    var je = function (e, t, n, r, o, i, a) {
        var s = 0,
          u = e.length,
          c = null == n;
        if ("object" === y(n))
          for (s in ((o = !0), n)) je(e, t, s, n[s], !0, i, a);
        else if (
          void 0 !== r &&
          ((o = !0),
          ce(r) || (a = !0),
          c &&
            (a
              ? (t.call(e, r), (t = null))
              : ((c = t),
                (t = function (e, t, n) {
                  return c.call(de(e), n);
                }))),
          t)
        )
          for (; s < u; s++) t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
        return o ? e : c ? t.call(e) : u ? t(e[0], n) : i;
      },
      Ee = /^-ms-/,
      Ie = /-([a-z])/g,
      Ne = function (e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
      };
    (i.uid = 1),
      (i.prototype = {
        cache: function (e) {
          var t = e[this.expando];
          return (
            t ||
              ((t = {}),
              Ne(e) &&
                (e.nodeType
                  ? (e[this.expando] = t)
                  : Object.defineProperty(e, this.expando, {
                      value: t,
                      configurable: !0,
                    }))),
            t
          );
        },
        set: function (e, t, n) {
          var r,
            o = this.cache(e);
          if ("string" == typeof t) o[p(t)] = n;
          else for (r in t) o[p(r)] = t[r];
          return o;
        },
        get: function (e, t) {
          return void 0 === t
            ? this.cache(e)
            : e[this.expando] && e[this.expando][p(t)];
        },
        access: function (e, t, n) {
          return void 0 === t || (t && "string" == typeof t && void 0 === n)
            ? this.get(e, t)
            : (this.set(e, t, n), void 0 !== n ? n : t);
        },
        remove: function (e, t) {
          var n,
            r = e[this.expando];
          if (void 0 !== r) {
            if (void 0 !== t) {
              n = (t = Array.isArray(t)
                ? t.map(p)
                : (t = p(t)) in r
                ? [t]
                : t.match(Te) || []).length;
              for (; n--; ) delete r[t[n]];
            }
            (void 0 === t || de.isEmptyObject(r)) &&
              (e.nodeType
                ? (e[this.expando] = void 0)
                : delete e[this.expando]);
          }
        },
        hasData: function (e) {
          var t = e[this.expando];
          return void 0 !== t && !de.isEmptyObject(t);
        },
      });
    var Pe = new i(),
      ke = new i(),
      De = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
      Me = /[A-Z]/g;
    de.extend({
      hasData: function (e) {
        return ke.hasData(e) || Pe.hasData(e);
      },
      data: function (e, t, n) {
        return ke.access(e, t, n);
      },
      removeData: function (e, t) {
        ke.remove(e, t);
      },
      _data: function (e, t, n) {
        return Pe.access(e, t, n);
      },
      _removeData: function (e, t) {
        Pe.remove(e, t);
      },
    }),
      de.fn.extend({
        data: function (n, e) {
          var t,
            r,
            o,
            i = this[0],
            a = i && i.attributes;
          if (void 0 !== n)
            return "object" == typeof n
              ? this.each(function () {
                  ke.set(this, n);
                })
              : je(
                  this,
                  function (e) {
                    var t;
                    if (i && void 0 === e)
                      return void 0 !== (t = ke.get(i, n))
                        ? t
                        : void 0 !== (t = h(i, n))
                        ? t
                        : void 0;
                    this.each(function () {
                      ke.set(this, n, e);
                    });
                  },
                  null,
                  e,
                  1 < arguments.length,
                  null,
                  !0
                );
          if (
            this.length &&
            ((o = ke.get(i)), 1 === i.nodeType && !Pe.get(i, "hasDataAttrs"))
          ) {
            for (t = a.length; t--; )
              a[t] &&
                0 === (r = a[t].name).indexOf("data-") &&
                ((r = p(r.slice(5))), h(i, r, o[r]));
            Pe.set(i, "hasDataAttrs", !0);
          }
          return o;
        },
        removeData: function (e) {
          return this.each(function () {
            ke.remove(this, e);
          });
        },
      }),
      de.extend({
        queue: function (e, t, n) {
          var r;
          if (e)
            return (
              (t = (t || "fx") + "queue"),
              (r = Pe.get(e, t)),
              n &&
                (!r || Array.isArray(n)
                  ? (r = Pe.access(e, t, de.makeArray(n)))
                  : r.push(n)),
              r || []
            );
        },
        dequeue: function (e, t) {
          t = t || "fx";
          var n = de.queue(e, t),
            r = n.length,
            o = n.shift(),
            i = de._queueHooks(e, t);
          "inprogress" === o && ((o = n.shift()), r--),
            o &&
              ("fx" === t && n.unshift("inprogress"),
              delete i.stop,
              o.call(
                e,
                function () {
                  de.dequeue(e, t);
                },
                i
              )),
            !r && i && i.empty.fire();
        },
        _queueHooks: function (e, t) {
          var n = t + "queueHooks";
          return (
            Pe.get(e, n) ||
            Pe.access(e, n, {
              empty: de.Callbacks("once memory").add(function () {
                Pe.remove(e, [t + "queue", n]);
              }),
            })
          );
        },
      }),
      de.fn.extend({
        queue: function (t, n) {
          var e = 2;
          return (
            "string" != typeof t && ((n = t), (t = "fx"), e--),
            arguments.length < e
              ? de.queue(this[0], t)
              : void 0 === n
              ? this
              : this.each(function () {
                  var e = de.queue(this, t, n);
                  de._queueHooks(this, t),
                    "fx" === t && "inprogress" !== e[0] && de.dequeue(this, t);
                })
          );
        },
        dequeue: function (e) {
          return this.each(function () {
            de.dequeue(this, e);
          });
        },
        clearQueue: function (e) {
          return this.queue(e || "fx", []);
        },
        promise: function (e, t) {
          var n,
            r = 1,
            o = de.Deferred(),
            i = this,
            a = this.length,
            s = function () {
              --r || o.resolveWith(i, [i]);
            };
          for (
            "string" != typeof e && ((t = e), (e = void 0)), e = e || "fx";
            a--;

          )
            (n = Pe.get(i[a], e + "queueHooks")) &&
              n.empty &&
              (r++, n.empty.add(s));
          return s(), o.promise(t);
        },
      });
    var Le = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
      Re = new RegExp("^(?:([+-])=|)(" + Le + ")([a-z%]*)$", "i"),
      _e = ["Top", "Right", "Bottom", "Left"],
      Fe = fe.documentElement,
      qe = function (e) {
        return de.contains(e.ownerDocument, e);
      },
      Be = { composed: !0 };
    Fe.getRootNode &&
      (qe = function (e) {
        return (
          de.contains(e.ownerDocument, e) ||
          e.getRootNode(Be) === e.ownerDocument
        );
      });
    var We = function (e, t) {
        return (
          "none" === (e = t || e).style.display ||
          ("" === e.style.display && qe(e) && "none" === de.css(e, "display"))
        );
      },
      He = {};
    de.fn.extend({
      show: function () {
        return v(this, !0);
      },
      hide: function () {
        return v(this);
      },
      toggle: function (e) {
        return "boolean" == typeof e
          ? e
            ? this.show()
            : this.hide()
          : this.each(function () {
              We(this) ? de(this).show() : de(this).hide();
            });
      },
    });
    var Ue,
      Je,
      Ge = /^(?:checkbox|radio)$/i,
      ze = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
      Ye = /^$|^module$|\/(?:java|ecma)script/i;
    (Ue = fe.createDocumentFragment().appendChild(fe.createElement("div"))),
      (Je = fe.createElement("input")).setAttribute("type", "radio"),
      Je.setAttribute("checked", "checked"),
      Je.setAttribute("name", "t"),
      Ue.appendChild(Je),
      (ue.checkClone = Ue.cloneNode(!0).cloneNode(!0).lastChild.checked),
      (Ue.innerHTML = "<textarea>x</textarea>"),
      (ue.noCloneChecked = !!Ue.cloneNode(!0).lastChild.defaultValue),
      (Ue.innerHTML = "<option></option>"),
      (ue.option = !!Ue.lastChild);
    var Ve = {
      thead: [1, "<table>", "</table>"],
      col: [2, "<table><colgroup>", "</colgroup></table>"],
      tr: [2, "<table><tbody>", "</tbody></table>"],
      td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
      _default: [0, "", ""],
    };
    (Ve.tbody = Ve.tfoot = Ve.colgroup = Ve.caption = Ve.thead),
      (Ve.th = Ve.td),
      ue.option ||
        (Ve.optgroup = Ve.option =
          [1, "<select multiple='multiple'>", "</select>"]);
    var Xe = /<|&#?\w+;/,
      Ze = /^key/,
      Qe = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
      Ke = /^([^.]*)(?:\.(.+)|)/;
    (de.event = {
      global: {},
      add: function (t, e, n, r, o) {
        var i,
          a,
          s,
          u,
          c,
          l,
          f,
          p,
          h,
          d,
          g,
          y = Pe.get(t);
        if (Ne(t))
          for (
            n.handler && ((n = (i = n).handler), (o = i.selector)),
              o && de.find.matchesSelector(Fe, o),
              n.guid || (n.guid = de.guid++),
              (u = y.events) || (u = y.events = Object.create(null)),
              (a = y.handle) ||
                (a = y.handle =
                  function (e) {
                    return void 0 !== de && de.event.triggered !== e.type
                      ? de.event.dispatch.apply(t, arguments)
                      : void 0;
                  }),
              c = (e = (e || "").match(Te) || [""]).length;
            c--;

          )
            (h = g = (s = Ke.exec(e[c]) || [])[1]),
              (d = (s[2] || "").split(".").sort()),
              h &&
                ((f = de.event.special[h] || {}),
                (h = (o ? f.delegateType : f.bindType) || h),
                (f = de.event.special[h] || {}),
                (l = de.extend(
                  {
                    type: h,
                    origType: g,
                    data: r,
                    handler: n,
                    guid: n.guid,
                    selector: o,
                    needsContext: o && de.expr.match.needsContext.test(o),
                    namespace: d.join("."),
                  },
                  i
                )),
                (p = u[h]) ||
                  (((p = u[h] = []).delegateCount = 0),
                  (f.setup && !1 !== f.setup.call(t, r, d, a)) ||
                    (t.addEventListener && t.addEventListener(h, a))),
                f.add &&
                  (f.add.call(t, l),
                  l.handler.guid || (l.handler.guid = n.guid)),
                o ? p.splice(p.delegateCount++, 0, l) : p.push(l),
                (de.event.global[h] = !0));
      },
      remove: function (e, t, n, r, o) {
        var i,
          a,
          s,
          u,
          c,
          l,
          f,
          p,
          h,
          d,
          g,
          y = Pe.hasData(e) && Pe.get(e);
        if (y && (u = y.events)) {
          for (c = (t = (t || "").match(Te) || [""]).length; c--; )
            if (
              ((h = g = (s = Ke.exec(t[c]) || [])[1]),
              (d = (s[2] || "").split(".").sort()),
              h)
            ) {
              for (
                f = de.event.special[h] || {},
                  p = u[(h = (r ? f.delegateType : f.bindType) || h)] || [],
                  s =
                    s[2] &&
                    new RegExp("(^|\\.)" + d.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                  a = i = p.length;
                i--;

              )
                (l = p[i]),
                  (!o && g !== l.origType) ||
                    (n && n.guid !== l.guid) ||
                    (s && !s.test(l.namespace)) ||
                    (r && r !== l.selector && ("**" !== r || !l.selector)) ||
                    (p.splice(i, 1),
                    l.selector && p.delegateCount--,
                    f.remove && f.remove.call(e, l));
              a &&
                !p.length &&
                ((f.teardown && !1 !== f.teardown.call(e, d, y.handle)) ||
                  de.removeEvent(e, h, y.handle),
                delete u[h]);
            } else for (h in u) de.event.remove(e, h + t[c], n, r, !0);
          de.isEmptyObject(u) && Pe.remove(e, "handle events");
        }
      },
      dispatch: function (e) {
        var t,
          n,
          r,
          o,
          i,
          a,
          s = new Array(arguments.length),
          u = de.event.fix(e),
          c = (Pe.get(this, "events") || Object.create(null))[u.type] || [],
          l = de.event.special[u.type] || {};
        for (s[0] = u, t = 1; t < arguments.length; t++) s[t] = arguments[t];
        if (
          ((u.delegateTarget = this),
          !l.preDispatch || !1 !== l.preDispatch.call(this, u))
        ) {
          for (
            a = de.event.handlers.call(this, u, c), t = 0;
            (o = a[t++]) && !u.isPropagationStopped();

          )
            for (
              u.currentTarget = o.elem, n = 0;
              (i = o.handlers[n++]) && !u.isImmediatePropagationStopped();

            )
              (u.rnamespace &&
                !1 !== i.namespace &&
                !u.rnamespace.test(i.namespace)) ||
                ((u.handleObj = i),
                (u.data = i.data),
                void 0 !==
                  (r = (
                    (de.event.special[i.origType] || {}).handle || i.handler
                  ).apply(o.elem, s)) &&
                  !1 === (u.result = r) &&
                  (u.preventDefault(), u.stopPropagation()));
          return l.postDispatch && l.postDispatch.call(this, u), u.result;
        }
      },
      handlers: function (e, t) {
        var n,
          r,
          o,
          i,
          a,
          s = [],
          u = t.delegateCount,
          c = e.target;
        if (u && c.nodeType && !("click" === e.type && 1 <= e.button))
          for (; c !== this; c = c.parentNode || this)
            if (1 === c.nodeType && ("click" !== e.type || !0 !== c.disabled)) {
              for (i = [], a = {}, n = 0; n < u; n++)
                void 0 === a[(o = (r = t[n]).selector + " ")] &&
                  (a[o] = r.needsContext
                    ? -1 < de(o, this).index(c)
                    : de.find(o, this, null, [c]).length),
                  a[o] && i.push(r);
              i.length && s.push({ elem: c, handlers: i });
            }
        return (
          (c = this),
          u < t.length && s.push({ elem: c, handlers: t.slice(u) }),
          s
        );
      },
      addProp: function (t, e) {
        Object.defineProperty(de.Event.prototype, t, {
          enumerable: !0,
          configurable: !0,
          get: ce(e)
            ? function () {
                if (this.originalEvent) return e(this.originalEvent);
              }
            : function () {
                if (this.originalEvent) return this.originalEvent[t];
              },
          set: function (e) {
            Object.defineProperty(this, t, {
              enumerable: !0,
              configurable: !0,
              writable: !0,
              value: e,
            });
          },
        });
      },
      fix: function (e) {
        return e[de.expando] ? e : new de.Event(e);
      },
      special: {
        load: { noBubble: !0 },
        click: {
          setup: function (e) {
            var t = this || e;
            return (
              Ge.test(t.type) && t.click && c(t, "input") && C(t, "click", a),
              !1
            );
          },
          trigger: function (e) {
            var t = this || e;
            return (
              Ge.test(t.type) && t.click && c(t, "input") && C(t, "click"), !0
            );
          },
          _default: function (e) {
            var t = e.target;
            return (
              (Ge.test(t.type) &&
                t.click &&
                c(t, "input") &&
                Pe.get(t, "click")) ||
              c(t, "a")
            );
          },
        },
        beforeunload: {
          postDispatch: function (e) {
            void 0 !== e.result &&
              e.originalEvent &&
              (e.originalEvent.returnValue = e.result);
          },
        },
      },
    }),
      (de.removeEvent = function (e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n);
      }),
      (de.Event = function (e, t) {
        if (!(this instanceof de.Event)) return new de.Event(e, t);
        e && e.type
          ? ((this.originalEvent = e),
            (this.type = e.type),
            (this.isDefaultPrevented =
              e.defaultPrevented ||
              (void 0 === e.defaultPrevented && !1 === e.returnValue)
                ? a
                : x),
            (this.target =
              e.target && 3 === e.target.nodeType
                ? e.target.parentNode
                : e.target),
            (this.currentTarget = e.currentTarget),
            (this.relatedTarget = e.relatedTarget))
          : (this.type = e),
          t && de.extend(this, t),
          (this.timeStamp = (e && e.timeStamp) || Date.now()),
          (this[de.expando] = !0);
      }),
      (de.Event.prototype = {
        constructor: de.Event,
        isDefaultPrevented: x,
        isPropagationStopped: x,
        isImmediatePropagationStopped: x,
        isSimulated: !1,
        preventDefault: function () {
          var e = this.originalEvent;
          (this.isDefaultPrevented = a),
            e && !this.isSimulated && e.preventDefault();
        },
        stopPropagation: function () {
          var e = this.originalEvent;
          (this.isPropagationStopped = a),
            e && !this.isSimulated && e.stopPropagation();
        },
        stopImmediatePropagation: function () {
          var e = this.originalEvent;
          (this.isImmediatePropagationStopped = a),
            e && !this.isSimulated && e.stopImmediatePropagation(),
            this.stopPropagation();
        },
      }),
      de.each(
        {
          altKey: !0,
          bubbles: !0,
          cancelable: !0,
          changedTouches: !0,
          ctrlKey: !0,
          detail: !0,
          eventPhase: !0,
          metaKey: !0,
          pageX: !0,
          pageY: !0,
          shiftKey: !0,
          view: !0,
          char: !0,
          code: !0,
          charCode: !0,
          key: !0,
          keyCode: !0,
          button: !0,
          buttons: !0,
          clientX: !0,
          clientY: !0,
          offsetX: !0,
          offsetY: !0,
          pointerId: !0,
          pointerType: !0,
          screenX: !0,
          screenY: !0,
          targetTouches: !0,
          toElement: !0,
          touches: !0,
          which: function (e) {
            var t = e.button;
            return null == e.which && Ze.test(e.type)
              ? null != e.charCode
                ? e.charCode
                : e.keyCode
              : !e.which && void 0 !== t && Qe.test(e.type)
              ? 1 & t
                ? 1
                : 2 & t
                ? 3
                : 4 & t
                ? 2
                : 0
              : e.which;
          },
        },
        de.event.addProp
      ),
      de.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
        de.event.special[e] = {
          setup: function () {
            return C(this, e, A), !1;
          },
          trigger: function () {
            return C(this, e), !0;
          },
          delegateType: t,
        };
      }),
      de.each(
        {
          mouseenter: "mouseover",
          mouseleave: "mouseout",
          pointerenter: "pointerover",
          pointerleave: "pointerout",
        },
        function (e, o) {
          de.event.special[e] = {
            delegateType: o,
            bindType: o,
            handle: function (e) {
              var t,
                n = e.relatedTarget,
                r = e.handleObj;
              return (
                (n && (n === this || de.contains(this, n))) ||
                  ((e.type = r.origType),
                  (t = r.handler.apply(this, arguments)),
                  (e.type = o)),
                t
              );
            },
          };
        }
      ),
      de.fn.extend({
        on: function (e, t, n, r) {
          return T(this, e, t, n, r);
        },
        one: function (e, t, n, r) {
          return T(this, e, t, n, r, 1);
        },
        off: function (e, t, n) {
          var r, o;
          if (e && e.preventDefault && e.handleObj)
            return (
              (r = e.handleObj),
              de(e.delegateTarget).off(
                r.namespace ? r.origType + "." + r.namespace : r.origType,
                r.selector,
                r.handler
              ),
              this
            );
          if ("object" != typeof e)
            return (
              (!1 !== t && "function" != typeof t) || ((n = t), (t = void 0)),
              !1 === n && (n = x),
              this.each(function () {
                de.event.remove(this, e, n, t);
              })
            );
          for (o in e) this.off(o, t, e[o]);
          return this;
        },
      });
    var $e = /<script|<style|<link/i,
      et = /checked\s*(?:[^=]|=\s*.checked.)/i,
      tt = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    de.extend({
      htmlPrefilter: function (e) {
        return e;
      },
      clone: function (e, t, n) {
        var r,
          o,
          i,
          a,
          s,
          u,
          c,
          l = e.cloneNode(!0),
          f = qe(e);
        if (
          !(
            ue.noCloneChecked ||
            (1 !== e.nodeType && 11 !== e.nodeType) ||
            de.isXMLDoc(e)
          )
        )
          for (a = m(l), r = 0, o = (i = m(e)).length; r < o; r++)
            (s = i[r]),
              "input" === (c = (u = a[r]).nodeName.toLowerCase()) &&
              Ge.test(s.type)
                ? (u.checked = s.checked)
                : ("input" !== c && "textarea" !== c) ||
                  (u.defaultValue = s.defaultValue);
        if (t)
          if (n)
            for (i = i || m(e), a = a || m(l), r = 0, o = i.length; r < o; r++)
              I(i[r], a[r]);
          else I(e, l);
        return 0 < (a = m(l, "script")).length && b(a, !f && m(e, "script")), l;
      },
      cleanData: function (e) {
        for (
          var t, n, r, o = de.event.special, i = 0;
          void 0 !== (n = e[i]);
          i++
        )
          if (Ne(n)) {
            if ((t = n[Pe.expando])) {
              if (t.events)
                for (r in t.events)
                  o[r] ? de.event.remove(n, r) : de.removeEvent(n, r, t.handle);
              n[Pe.expando] = void 0;
            }
            n[ke.expando] && (n[ke.expando] = void 0);
          }
      },
    }),
      de.fn.extend({
        detach: function (e) {
          return P(this, e, !0);
        },
        remove: function (e) {
          return P(this, e);
        },
        text: function (e) {
          return je(
            this,
            function (e) {
              return void 0 === e
                ? de.text(this)
                : this.empty().each(function () {
                    (1 !== this.nodeType &&
                      11 !== this.nodeType &&
                      9 !== this.nodeType) ||
                      (this.textContent = e);
                  });
            },
            null,
            e,
            arguments.length
          );
        },
        append: function () {
          return N(this, arguments, function (e) {
            (1 !== this.nodeType &&
              11 !== this.nodeType &&
              9 !== this.nodeType) ||
              O(this, e).appendChild(e);
          });
        },
        prepend: function () {
          return N(this, arguments, function (e) {
            if (
              1 === this.nodeType ||
              11 === this.nodeType ||
              9 === this.nodeType
            ) {
              var t = O(this, e);
              t.insertBefore(e, t.firstChild);
            }
          });
        },
        before: function () {
          return N(this, arguments, function (e) {
            this.parentNode && this.parentNode.insertBefore(e, this);
          });
        },
        after: function () {
          return N(this, arguments, function (e) {
            this.parentNode &&
              this.parentNode.insertBefore(e, this.nextSibling);
          });
        },
        empty: function () {
          for (var e, t = 0; null != (e = this[t]); t++)
            1 === e.nodeType && (de.cleanData(m(e, !1)), (e.textContent = ""));
          return this;
        },
        clone: function (e, t) {
          return (
            (e = null != e && e),
            (t = null == t ? e : t),
            this.map(function () {
              return de.clone(this, e, t);
            })
          );
        },
        html: function (e) {
          return je(
            this,
            function (e) {
              var t = this[0] || {},
                n = 0,
                r = this.length;
              if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
              if (
                "string" == typeof e &&
                !$e.test(e) &&
                !Ve[(ze.exec(e) || ["", ""])[1].toLowerCase()]
              ) {
                e = de.htmlPrefilter(e);
                try {
                  for (; n < r; n++)
                    1 === (t = this[n] || {}).nodeType &&
                      (de.cleanData(m(t, !1)), (t.innerHTML = e));
                  t = 0;
                } catch (e) {}
              }
              t && this.empty().append(e);
            },
            null,
            e,
            arguments.length
          );
        },
        replaceWith: function () {
          var n = [];
          return N(
            this,
            arguments,
            function (e) {
              var t = this.parentNode;
              de.inArray(this, n) < 0 &&
                (de.cleanData(m(this)), t && t.replaceChild(e, this));
            },
            n
          );
        },
      }),
      de.each(
        {
          appendTo: "append",
          prependTo: "prepend",
          insertBefore: "before",
          insertAfter: "after",
          replaceAll: "replaceWith",
        },
        function (e, a) {
          de.fn[e] = function (e) {
            for (var t, n = [], r = de(e), o = r.length - 1, i = 0; i <= o; i++)
              (t = i === o ? this : this.clone(!0)),
                de(r[i])[a](t),
                te.apply(n, t.get());
            return this.pushStack(n);
          };
        }
      );
    var nt = new RegExp("^(" + Le + ")(?!px)[a-z%]+$", "i"),
      rt = function (e) {
        var t = e.ownerDocument.defaultView;
        return (t && t.opener) || (t = S), t.getComputedStyle(e);
      },
      ot = function (e, t, n) {
        var r,
          o,
          i = {};
        for (o in t) (i[o] = e.style[o]), (e.style[o] = t[o]);
        for (o in ((r = n.call(e)), t)) e.style[o] = i[o];
        return r;
      },
      it = new RegExp(_e.join("|"), "i");
    !(function () {
      function e() {
        if (c) {
          (u.style.cssText =
            "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
            (c.style.cssText =
              "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
            Fe.appendChild(u).appendChild(c);
          var e = S.getComputedStyle(c);
          (n = "1%" !== e.top),
            (s = 12 === t(e.marginLeft)),
            (c.style.right = "60%"),
            (i = 36 === t(e.right)),
            (r = 36 === t(e.width)),
            (c.style.position = "absolute"),
            (o = 12 === t(c.offsetWidth / 3)),
            Fe.removeChild(u),
            (c = null);
        }
      }
      function t(e) {
        return Math.round(parseFloat(e));
      }
      var n,
        r,
        o,
        i,
        a,
        s,
        u = fe.createElement("div"),
        c = fe.createElement("div");
      c.style &&
        ((c.style.backgroundClip = "content-box"),
        (c.cloneNode(!0).style.backgroundClip = ""),
        (ue.clearCloneStyle = "content-box" === c.style.backgroundClip),
        de.extend(ue, {
          boxSizingReliable: function () {
            return e(), r;
          },
          pixelBoxStyles: function () {
            return e(), i;
          },
          pixelPosition: function () {
            return e(), n;
          },
          reliableMarginLeft: function () {
            return e(), s;
          },
          scrollboxSize: function () {
            return e(), o;
          },
          reliableTrDimensions: function () {
            var e, t, n, r;
            return (
              null == a &&
                ((e = fe.createElement("table")),
                (t = fe.createElement("tr")),
                (n = fe.createElement("div")),
                (e.style.cssText = "position:absolute;left:-11111px"),
                (t.style.height = "1px"),
                (n.style.height = "9px"),
                Fe.appendChild(e).appendChild(t).appendChild(n),
                (r = S.getComputedStyle(t)),
                (a = 3 < parseInt(r.height)),
                Fe.removeChild(e)),
              a
            );
          },
        }));
    })();
    var at = ["Webkit", "Moz", "ms"],
      st = fe.createElement("div").style,
      ut = {},
      ct = /^(none|table(?!-c[ea]).+)/,
      lt = /^--/,
      ft = { position: "absolute", visibility: "hidden", display: "block" },
      pt = { letterSpacing: "0", fontWeight: "400" };
    de.extend({
      cssHooks: {
        opacity: {
          get: function (e, t) {
            if (t) {
              var n = k(e, "opacity");
              return "" === n ? "1" : n;
            }
          },
        },
      },
      cssNumber: {
        animationIterationCount: !0,
        columnCount: !0,
        fillOpacity: !0,
        flexGrow: !0,
        flexShrink: !0,
        fontWeight: !0,
        gridArea: !0,
        gridColumn: !0,
        gridColumnEnd: !0,
        gridColumnStart: !0,
        gridRow: !0,
        gridRowEnd: !0,
        gridRowStart: !0,
        lineHeight: !0,
        opacity: !0,
        order: !0,
        orphans: !0,
        widows: !0,
        zIndex: !0,
        zoom: !0,
      },
      cssProps: {},
      style: function (e, t, n, r) {
        if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
          var o,
            i,
            a,
            s = p(t),
            u = lt.test(t),
            c = e.style;
          if (
            (u || (t = M(s)),
            (a = de.cssHooks[t] || de.cssHooks[s]),
            void 0 === n)
          )
            return a && "get" in a && void 0 !== (o = a.get(e, !1, r))
              ? o
              : c[t];
          "string" == (i = typeof n) &&
            (o = Re.exec(n)) &&
            o[1] &&
            ((n = d(e, t, o)), (i = "number")),
            null != n &&
              n == n &&
              ("number" !== i ||
                u ||
                (n += (o && o[3]) || (de.cssNumber[s] ? "" : "px")),
              ue.clearCloneStyle ||
                "" !== n ||
                0 !== t.indexOf("background") ||
                (c[t] = "inherit"),
              (a && "set" in a && void 0 === (n = a.set(e, n, r))) ||
                (u ? c.setProperty(t, n) : (c[t] = n)));
        }
      },
      css: function (e, t, n, r) {
        var o,
          i,
          a,
          s = p(t);
        return (
          lt.test(t) || (t = M(s)),
          (a = de.cssHooks[t] || de.cssHooks[s]) &&
            "get" in a &&
            (o = a.get(e, !0, n)),
          void 0 === o && (o = k(e, t, r)),
          "normal" === o && t in pt && (o = pt[t]),
          "" === n || n
            ? ((i = parseFloat(o)), !0 === n || isFinite(i) ? i || 0 : o)
            : o
        );
      },
    }),
      de.each(["height", "width"], function (e, u) {
        de.cssHooks[u] = {
          get: function (e, t, n) {
            if (t)
              return !ct.test(de.css(e, "display")) ||
                (e.getClientRects().length && e.getBoundingClientRect().width)
                ? _(e, u, n)
                : ot(e, ft, function () {
                    return _(e, u, n);
                  });
          },
          set: function (e, t, n) {
            var r,
              o = rt(e),
              i = !ue.scrollboxSize() && "absolute" === o.position,
              a = (i || n) && "border-box" === de.css(e, "boxSizing", !1, o),
              s = n ? R(e, u, n, a, o) : 0;
            return (
              a &&
                i &&
                (s -= Math.ceil(
                  e["offset" + u[0].toUpperCase() + u.slice(1)] -
                    parseFloat(o[u]) -
                    R(e, u, "border", !1, o) -
                    0.5
                )),
              s &&
                (r = Re.exec(t)) &&
                "px" !== (r[3] || "px") &&
                ((e.style[u] = t), (t = de.css(e, u))),
              L(0, t, s)
            );
          },
        };
      }),
      (de.cssHooks.marginLeft = D(ue.reliableMarginLeft, function (e, t) {
        if (t)
          return (
            (parseFloat(k(e, "marginLeft")) ||
              e.getBoundingClientRect().left -
                ot(e, { marginLeft: 0 }, function () {
                  return e.getBoundingClientRect().left;
                })) + "px"
          );
      })),
      de.each({ margin: "", padding: "", border: "Width" }, function (o, i) {
        (de.cssHooks[o + i] = {
          expand: function (e) {
            for (
              var t = 0, n = {}, r = "string" == typeof e ? e.split(" ") : [e];
              t < 4;
              t++
            )
              n[o + _e[t] + i] = r[t] || r[t - 2] || r[0];
            return n;
          },
        }),
          "margin" !== o && (de.cssHooks[o + i].set = L);
      }),
      de.fn.extend({
        css: function (e, t) {
          return je(
            this,
            function (e, t, n) {
              var r,
                o,
                i = {},
                a = 0;
              if (Array.isArray(t)) {
                for (r = rt(e), o = t.length; a < o; a++)
                  i[t[a]] = de.css(e, t[a], !1, r);
                return i;
              }
              return void 0 !== n ? de.style(e, t, n) : de.css(e, t);
            },
            e,
            t,
            1 < arguments.length
          );
        },
      }),
      (((de.Tween = F).prototype = {
        constructor: F,
        init: function (e, t, n, r, o, i) {
          (this.elem = e),
            (this.prop = n),
            (this.easing = o || de.easing._default),
            (this.options = t),
            (this.start = this.now = this.cur()),
            (this.end = r),
            (this.unit = i || (de.cssNumber[n] ? "" : "px"));
        },
        cur: function () {
          var e = F.propHooks[this.prop];
          return e && e.get ? e.get(this) : F.propHooks._default.get(this);
        },
        run: function (e) {
          var t,
            n = F.propHooks[this.prop];
          return (
            this.options.duration
              ? (this.pos = t =
                  de.easing[this.easing](
                    e,
                    this.options.duration * e,
                    0,
                    1,
                    this.options.duration
                  ))
              : (this.pos = t = e),
            (this.now = (this.end - this.start) * t + this.start),
            this.options.step &&
              this.options.step.call(this.elem, this.now, this),
            n && n.set ? n.set(this) : F.propHooks._default.set(this),
            this
          );
        },
      }).init.prototype = F.prototype),
      ((F.propHooks = {
        _default: {
          get: function (e) {
            var t;
            return 1 !== e.elem.nodeType ||
              (null != e.elem[e.prop] && null == e.elem.style[e.prop])
              ? e.elem[e.prop]
              : (t = de.css(e.elem, e.prop, "")) && "auto" !== t
              ? t
              : 0;
          },
          set: function (e) {
            de.fx.step[e.prop]
              ? de.fx.step[e.prop](e)
              : 1 !== e.elem.nodeType ||
                (!de.cssHooks[e.prop] && null == e.elem.style[M(e.prop)])
              ? (e.elem[e.prop] = e.now)
              : de.style(e.elem, e.prop, e.now + e.unit);
          },
        },
      }).scrollTop = F.propHooks.scrollLeft =
        {
          set: function (e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
          },
        }),
      (de.easing = {
        linear: function (e) {
          return e;
        },
        swing: function (e) {
          return 0.5 - Math.cos(e * Math.PI) / 2;
        },
        _default: "swing",
      }),
      (de.fx = F.prototype.init),
      (de.fx.step = {});
    var ht,
      dt,
      gt,
      yt,
      vt = /^(?:toggle|show|hide)$/,
      mt = /queueHooks$/;
    (de.Animation = de.extend(U, {
      tweeners: {
        "*": [
          function (e, t) {
            var n = this.createTween(e, t);
            return d(n.elem, e, Re.exec(t), n), n;
          },
        ],
      },
      tweener: function (e, t) {
        ce(e) ? ((t = e), (e = ["*"])) : (e = e.match(Te));
        for (var n, r = 0, o = e.length; r < o; r++)
          (n = e[r]),
            (U.tweeners[n] = U.tweeners[n] || []),
            U.tweeners[n].unshift(t);
      },
      prefilters: [
        function (e, t, n) {
          var r,
            o,
            i,
            a,
            s,
            u,
            c,
            l,
            f = "width" in t || "height" in t,
            p = this,
            h = {},
            d = e.style,
            g = e.nodeType && We(e),
            y = Pe.get(e, "fxshow");
          for (r in (n.queue ||
            (null == (a = de._queueHooks(e, "fx")).unqueued &&
              ((a.unqueued = 0),
              (s = a.empty.fire),
              (a.empty.fire = function () {
                a.unqueued || s();
              })),
            a.unqueued++,
            p.always(function () {
              p.always(function () {
                a.unqueued--, de.queue(e, "fx").length || a.empty.fire();
              });
            })),
          t))
            if (((o = t[r]), vt.test(o))) {
              if (
                (delete t[r],
                (i = i || "toggle" === o),
                o === (g ? "hide" : "show"))
              ) {
                if ("show" !== o || !y || void 0 === y[r]) continue;
                g = !0;
              }
              h[r] = (y && y[r]) || de.style(e, r);
            }
          if ((u = !de.isEmptyObject(t)) || !de.isEmptyObject(h))
            for (r in (f &&
              1 === e.nodeType &&
              ((n.overflow = [d.overflow, d.overflowX, d.overflowY]),
              null == (c = y && y.display) && (c = Pe.get(e, "display")),
              "none" === (l = de.css(e, "display")) &&
                (c
                  ? (l = c)
                  : (v([e], !0),
                    (c = e.style.display || c),
                    (l = de.css(e, "display")),
                    v([e]))),
              ("inline" === l || ("inline-block" === l && null != c)) &&
                "none" === de.css(e, "float") &&
                (u ||
                  (p.done(function () {
                    d.display = c;
                  }),
                  null == c && ((l = d.display), (c = "none" === l ? "" : l))),
                (d.display = "inline-block"))),
            n.overflow &&
              ((d.overflow = "hidden"),
              p.always(function () {
                (d.overflow = n.overflow[0]),
                  (d.overflowX = n.overflow[1]),
                  (d.overflowY = n.overflow[2]);
              })),
            (u = !1),
            h))
              u ||
                (y
                  ? "hidden" in y && (g = y.hidden)
                  : (y = Pe.access(e, "fxshow", { display: c })),
                i && (y.hidden = !g),
                g && v([e], !0),
                p.done(function () {
                  for (r in (g || v([e]), Pe.remove(e, "fxshow"), h))
                    de.style(e, r, h[r]);
                })),
                (u = H(g ? y[r] : 0, r, p)),
                r in y ||
                  ((y[r] = u.start), g && ((u.end = u.start), (u.start = 0)));
        },
      ],
      prefilter: function (e, t) {
        t ? U.prefilters.unshift(e) : U.prefilters.push(e);
      },
    })),
      (de.speed = function (e, t, n) {
        var r =
          e && "object" == typeof e
            ? de.extend({}, e)
            : {
                complete: n || (!n && t) || (ce(e) && e),
                duration: e,
                easing: (n && t) || (t && !ce(t) && t),
              };
        return (
          de.fx.off
            ? (r.duration = 0)
            : "number" != typeof r.duration &&
              (r.duration in de.fx.speeds
                ? (r.duration = de.fx.speeds[r.duration])
                : (r.duration = de.fx.speeds._default)),
          (null != r.queue && !0 !== r.queue) || (r.queue = "fx"),
          (r.old = r.complete),
          (r.complete = function () {
            ce(r.old) && r.old.call(this), r.queue && de.dequeue(this, r.queue);
          }),
          r
        );
      }),
      de.fn.extend({
        fadeTo: function (e, t, n, r) {
          return this.filter(We)
            .css("opacity", 0)
            .show()
            .end()
            .animate({ opacity: t }, e, n, r);
        },
        animate: function (t, e, n, r) {
          var o = de.isEmptyObject(t),
            i = de.speed(e, n, r),
            a = function () {
              var e = U(this, de.extend({}, t), i);
              (o || Pe.get(this, "finish")) && e.stop(!0);
            };
          return (
            (a.finish = a),
            o || !1 === i.queue ? this.each(a) : this.queue(i.queue, a)
          );
        },
        stop: function (o, e, i) {
          var a = function (e) {
            var t = e.stop;
            delete e.stop, t(i);
          };
          return (
            "string" != typeof o && ((i = e), (e = o), (o = void 0)),
            e && this.queue(o || "fx", []),
            this.each(function () {
              var e = !0,
                t = null != o && o + "queueHooks",
                n = de.timers,
                r = Pe.get(this);
              if (t) r[t] && r[t].stop && a(r[t]);
              else for (t in r) r[t] && r[t].stop && mt.test(t) && a(r[t]);
              for (t = n.length; t--; )
                n[t].elem !== this ||
                  (null != o && n[t].queue !== o) ||
                  (n[t].anim.stop(i), (e = !1), n.splice(t, 1));
              (!e && i) || de.dequeue(this, o);
            })
          );
        },
        finish: function (a) {
          return (
            !1 !== a && (a = a || "fx"),
            this.each(function () {
              var e,
                t = Pe.get(this),
                n = t[a + "queue"],
                r = t[a + "queueHooks"],
                o = de.timers,
                i = n ? n.length : 0;
              for (
                t.finish = !0,
                  de.queue(this, a, []),
                  r && r.stop && r.stop.call(this, !0),
                  e = o.length;
                e--;

              )
                o[e].elem === this &&
                  o[e].queue === a &&
                  (o[e].anim.stop(!0), o.splice(e, 1));
              for (e = 0; e < i; e++)
                n[e] && n[e].finish && n[e].finish.call(this);
              delete t.finish;
            })
          );
        },
      }),
      de.each(["toggle", "show", "hide"], function (e, r) {
        var o = de.fn[r];
        de.fn[r] = function (e, t, n) {
          return null == e || "boolean" == typeof e
            ? o.apply(this, arguments)
            : this.animate(W(r, !0), e, t, n);
        };
      }),
      de.each(
        {
          slideDown: W("show"),
          slideUp: W("hide"),
          slideToggle: W("toggle"),
          fadeIn: { opacity: "show" },
          fadeOut: { opacity: "hide" },
          fadeToggle: { opacity: "toggle" },
        },
        function (e, r) {
          de.fn[e] = function (e, t, n) {
            return this.animate(r, e, t, n);
          };
        }
      ),
      (de.timers = []),
      (de.fx.tick = function () {
        var e,
          t = 0,
          n = de.timers;
        for (ht = Date.now(); t < n.length; t++)
          (e = n[t])() || n[t] !== e || n.splice(t--, 1);
        n.length || de.fx.stop(), (ht = void 0);
      }),
      (de.fx.timer = function (e) {
        de.timers.push(e), de.fx.start();
      }),
      (de.fx.interval = 13),
      (de.fx.start = function () {
        dt || ((dt = !0), q());
      }),
      (de.fx.stop = function () {
        dt = null;
      }),
      (de.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
      (de.fn.delay = function (r, e) {
        return (
          (r = (de.fx && de.fx.speeds[r]) || r),
          (e = e || "fx"),
          this.queue(e, function (e, t) {
            var n = S.setTimeout(e, r);
            t.stop = function () {
              S.clearTimeout(n);
            };
          })
        );
      }),
      (gt = fe.createElement("input")),
      (yt = fe.createElement("select").appendChild(fe.createElement("option"))),
      (gt.type = "checkbox"),
      (ue.checkOn = "" !== gt.value),
      (ue.optSelected = yt.selected),
      ((gt = fe.createElement("input")).value = "t"),
      (gt.type = "radio"),
      (ue.radioValue = "t" === gt.value);
    var bt,
      wt = de.expr.attrHandle;
    de.fn.extend({
      attr: function (e, t) {
        return je(this, de.attr, e, t, 1 < arguments.length);
      },
      removeAttr: function (e) {
        return this.each(function () {
          de.removeAttr(this, e);
        });
      },
    }),
      de.extend({
        attr: function (e, t, n) {
          var r,
            o,
            i = e.nodeType;
          if (3 !== i && 8 !== i && 2 !== i)
            return "undefined" == typeof e.getAttribute
              ? de.prop(e, t, n)
              : ((1 === i && de.isXMLDoc(e)) ||
                  (o =
                    de.attrHooks[t.toLowerCase()] ||
                    (de.expr.match.bool.test(t) ? bt : void 0)),
                void 0 !== n
                  ? null === n
                    ? void de.removeAttr(e, t)
                    : o && "set" in o && void 0 !== (r = o.set(e, n, t))
                    ? r
                    : (e.setAttribute(t, n + ""), n)
                  : o && "get" in o && null !== (r = o.get(e, t))
                  ? r
                  : null == (r = de.find.attr(e, t))
                  ? void 0
                  : r);
        },
        attrHooks: {
          type: {
            set: function (e, t) {
              if (!ue.radioValue && "radio" === t && c(e, "input")) {
                var n = e.value;
                return e.setAttribute("type", t), n && (e.value = n), t;
              }
            },
          },
        },
        removeAttr: function (e, t) {
          var n,
            r = 0,
            o = t && t.match(Te);
          if (o && 1 === e.nodeType)
            for (; (n = o[r++]); ) e.removeAttribute(n);
        },
      }),
      (bt = {
        set: function (e, t, n) {
          return !1 === t ? de.removeAttr(e, n) : e.setAttribute(n, n), n;
        },
      }),
      de.each(de.expr.match.bool.source.match(/\w+/g), function (e, t) {
        var a = wt[t] || de.find.attr;
        wt[t] = function (e, t, n) {
          var r,
            o,
            i = t.toLowerCase();
          return (
            n ||
              ((o = wt[i]),
              (wt[i] = r),
              (r = null != a(e, t, n) ? i : null),
              (wt[i] = o)),
            r
          );
        };
      });
    var xt = /^(?:input|select|textarea|button)$/i,
      At = /^(?:a|area)$/i;
    de.fn.extend({
      prop: function (e, t) {
        return je(this, de.prop, e, t, 1 < arguments.length);
      },
      removeProp: function (e) {
        return this.each(function () {
          delete this[de.propFix[e] || e];
        });
      },
    }),
      de.extend({
        prop: function (e, t, n) {
          var r,
            o,
            i = e.nodeType;
          if (3 !== i && 8 !== i && 2 !== i)
            return (
              (1 === i && de.isXMLDoc(e)) ||
                ((t = de.propFix[t] || t), (o = de.propHooks[t])),
              void 0 !== n
                ? o && "set" in o && void 0 !== (r = o.set(e, n, t))
                  ? r
                  : (e[t] = n)
                : o && "get" in o && null !== (r = o.get(e, t))
                ? r
                : e[t]
            );
        },
        propHooks: {
          tabIndex: {
            get: function (e) {
              var t = de.find.attr(e, "tabindex");
              return t
                ? parseInt(t, 10)
                : xt.test(e.nodeName) || (At.test(e.nodeName) && e.href)
                ? 0
                : -1;
            },
          },
        },
        propFix: { for: "htmlFor", class: "className" },
      }),
      ue.optSelected ||
        (de.propHooks.selected = {
          get: function (e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex, null;
          },
          set: function (e) {
            var t = e.parentNode;
            t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
          },
        }),
      de.each(
        [
          "tabIndex",
          "readOnly",
          "maxLength",
          "cellSpacing",
          "cellPadding",
          "rowSpan",
          "colSpan",
          "useMap",
          "frameBorder",
          "contentEditable",
        ],
        function () {
          de.propFix[this.toLowerCase()] = this;
        }
      ),
      de.fn.extend({
        addClass: function (t) {
          var e,
            n,
            r,
            o,
            i,
            a,
            s,
            u = 0;
          if (ce(t))
            return this.each(function (e) {
              de(this).addClass(t.call(this, e, G(this)));
            });
          if ((e = z(t)).length)
            for (; (n = this[u++]); )
              if (((o = G(n)), (r = 1 === n.nodeType && " " + J(o) + " "))) {
                for (a = 0; (i = e[a++]); )
                  r.indexOf(" " + i + " ") < 0 && (r += i + " ");
                o !== (s = J(r)) && n.setAttribute("class", s);
              }
          return this;
        },
        removeClass: function (t) {
          var e,
            n,
            r,
            o,
            i,
            a,
            s,
            u = 0;
          if (ce(t))
            return this.each(function (e) {
              de(this).removeClass(t.call(this, e, G(this)));
            });
          if (!arguments.length) return this.attr("class", "");
          if ((e = z(t)).length)
            for (; (n = this[u++]); )
              if (((o = G(n)), (r = 1 === n.nodeType && " " + J(o) + " "))) {
                for (a = 0; (i = e[a++]); )
                  for (; -1 < r.indexOf(" " + i + " "); )
                    r = r.replace(" " + i + " ", " ");
                o !== (s = J(r)) && n.setAttribute("class", s);
              }
          return this;
        },
        toggleClass: function (o, t) {
          var i = typeof o,
            a = "string" === i || Array.isArray(o);
          return "boolean" == typeof t && a
            ? t
              ? this.addClass(o)
              : this.removeClass(o)
            : ce(o)
            ? this.each(function (e) {
                de(this).toggleClass(o.call(this, e, G(this), t), t);
              })
            : this.each(function () {
                var e, t, n, r;
                if (a)
                  for (t = 0, n = de(this), r = z(o); (e = r[t++]); )
                    n.hasClass(e) ? n.removeClass(e) : n.addClass(e);
                else
                  (void 0 !== o && "boolean" !== i) ||
                    ((e = G(this)) && Pe.set(this, "__className__", e),
                    this.setAttribute &&
                      this.setAttribute(
                        "class",
                        e || !1 === o ? "" : Pe.get(this, "__className__") || ""
                      ));
              });
        },
        hasClass: function (e) {
          var t,
            n,
            r = 0;
          for (t = " " + e + " "; (n = this[r++]); )
            if (1 === n.nodeType && -1 < (" " + J(G(n)) + " ").indexOf(t))
              return !0;
          return !1;
        },
      });
    var St = /\r/g;
    de.fn.extend({
      val: function (n) {
        var r,
          e,
          o,
          t = this[0];
        return arguments.length
          ? ((o = ce(n)),
            this.each(function (e) {
              var t;
              1 === this.nodeType &&
                (null == (t = o ? n.call(this, e, de(this).val()) : n)
                  ? (t = "")
                  : "number" == typeof t
                  ? (t += "")
                  : Array.isArray(t) &&
                    (t = de.map(t, function (e) {
                      return null == e ? "" : e + "";
                    })),
                ((r =
                  de.valHooks[this.type] ||
                  de.valHooks[this.nodeName.toLowerCase()]) &&
                  "set" in r &&
                  void 0 !== r.set(this, t, "value")) ||
                  (this.value = t));
            }))
          : t
          ? (r =
              de.valHooks[t.type] || de.valHooks[t.nodeName.toLowerCase()]) &&
            "get" in r &&
            void 0 !== (e = r.get(t, "value"))
            ? e
            : "string" == typeof (e = t.value)
            ? e.replace(St, "")
            : null == e
            ? ""
            : e
          : void 0;
      },
    }),
      de.extend({
        valHooks: {
          option: {
            get: function (e) {
              var t = de.find.attr(e, "value");
              return null != t ? t : J(de.text(e));
            },
          },
          select: {
            get: function (e) {
              var t,
                n,
                r,
                o = e.options,
                i = e.selectedIndex,
                a = "select-one" === e.type,
                s = a ? null : [],
                u = a ? i + 1 : o.length;
              for (r = i < 0 ? u : a ? i : 0; r < u; r++)
                if (
                  ((n = o[r]).selected || r === i) &&
                  !n.disabled &&
                  (!n.parentNode.disabled || !c(n.parentNode, "optgroup"))
                ) {
                  if (((t = de(n).val()), a)) return t;
                  s.push(t);
                }
              return s;
            },
            set: function (e, t) {
              for (
                var n, r, o = e.options, i = de.makeArray(t), a = o.length;
                a--;

              )
                ((r = o[a]).selected =
                  -1 < de.inArray(de.valHooks.option.get(r), i)) && (n = !0);
              return n || (e.selectedIndex = -1), i;
            },
          },
        },
      }),
      de.each(["radio", "checkbox"], function () {
        (de.valHooks[this] = {
          set: function (e, t) {
            if (Array.isArray(t))
              return (e.checked = -1 < de.inArray(de(e).val(), t));
          },
        }),
          ue.checkOn ||
            (de.valHooks[this].get = function (e) {
              return null === e.getAttribute("value") ? "on" : e.value;
            });
      }),
      (ue.focusin = "onfocusin" in S);
    var Tt = /^(?:focusinfocus|focusoutblur)$/,
      Ct = function (e) {
        e.stopPropagation();
      };
    de.extend(de.event, {
      trigger: function (e, t, n, r) {
        var o,
          i,
          a,
          s,
          u,
          c,
          l,
          f,
          p = [n || fe],
          h = ie.call(e, "type") ? e.type : e,
          d = ie.call(e, "namespace") ? e.namespace.split(".") : [];
        if (
          ((i = f = a = n = n || fe),
          3 !== n.nodeType &&
            8 !== n.nodeType &&
            !Tt.test(h + de.event.triggered) &&
            (-1 < h.indexOf(".") &&
              ((h = (d = h.split(".")).shift()), d.sort()),
            (u = h.indexOf(":") < 0 && "on" + h),
            ((e = e[de.expando]
              ? e
              : new de.Event(h, "object" == typeof e && e)).isTrigger = r
              ? 2
              : 3),
            (e.namespace = d.join(".")),
            (e.rnamespace = e.namespace
              ? new RegExp("(^|\\.)" + d.join("\\.(?:.*\\.|)") + "(\\.|$)")
              : null),
            (e.result = void 0),
            e.target || (e.target = n),
            (t = null == t ? [e] : de.makeArray(t, [e])),
            (l = de.event.special[h] || {}),
            r || !l.trigger || !1 !== l.trigger.apply(n, t)))
        ) {
          if (!r && !l.noBubble && !le(n)) {
            for (
              s = l.delegateType || h, Tt.test(s + h) || (i = i.parentNode);
              i;
              i = i.parentNode
            )
              p.push(i), (a = i);
            a === (n.ownerDocument || fe) &&
              p.push(a.defaultView || a.parentWindow || S);
          }
          for (o = 0; (i = p[o++]) && !e.isPropagationStopped(); )
            (f = i),
              (e.type = 1 < o ? s : l.bindType || h),
              (c =
                (Pe.get(i, "events") || Object.create(null))[e.type] &&
                Pe.get(i, "handle")) && c.apply(i, t),
              (c = u && i[u]) &&
                c.apply &&
                Ne(i) &&
                ((e.result = c.apply(i, t)),
                !1 === e.result && e.preventDefault());
          return (
            (e.type = h),
            r ||
              e.isDefaultPrevented() ||
              (l._default && !1 !== l._default.apply(p.pop(), t)) ||
              !Ne(n) ||
              (u &&
                ce(n[h]) &&
                !le(n) &&
                ((a = n[u]) && (n[u] = null),
                (de.event.triggered = h),
                e.isPropagationStopped() && f.addEventListener(h, Ct),
                n[h](),
                e.isPropagationStopped() && f.removeEventListener(h, Ct),
                (de.event.triggered = void 0),
                a && (n[u] = a))),
            e.result
          );
        }
      },
      simulate: function (e, t, n) {
        var r = de.extend(new de.Event(), n, { type: e, isSimulated: !0 });
        de.event.trigger(r, null, t);
      },
    }),
      de.fn.extend({
        trigger: function (e, t) {
          return this.each(function () {
            de.event.trigger(e, t, this);
          });
        },
        triggerHandler: function (e, t) {
          var n = this[0];
          if (n) return de.event.trigger(e, t, n, !0);
        },
      }),
      ue.focusin ||
        de.each({ focus: "focusin", blur: "focusout" }, function (n, r) {
          var o = function (e) {
            de.event.simulate(r, e.target, de.event.fix(e));
          };
          de.event.special[r] = {
            setup: function () {
              var e = this.ownerDocument || this.document || this,
                t = Pe.access(e, r);
              t || e.addEventListener(n, o, !0), Pe.access(e, r, (t || 0) + 1);
            },
            teardown: function () {
              var e = this.ownerDocument || this.document || this,
                t = Pe.access(e, r) - 1;
              t
                ? Pe.access(e, r, t)
                : (e.removeEventListener(n, o, !0), Pe.remove(e, r));
            },
          };
        });
    var Ot = S.location,
      jt = { guid: Date.now() },
      Et = /\?/;
    de.parseXML = function (e) {
      var t;
      if (!e || "string" != typeof e) return null;
      try {
        t = new S.DOMParser().parseFromString(e, "text/xml");
      } catch (e) {
        t = void 0;
      }
      return (
        (t && !t.getElementsByTagName("parsererror").length) ||
          de.error("Invalid XML: " + e),
        t
      );
    };
    var It = /\[\]$/,
      Nt = /\r?\n/g,
      Pt = /^(?:submit|button|image|reset|file)$/i,
      kt = /^(?:input|select|textarea|keygen)/i;
    (de.param = function (e, t) {
      var n,
        r = [],
        o = function (e, t) {
          var n = ce(t) ? t() : t;
          r[r.length] =
            encodeURIComponent(e) +
            "=" +
            encodeURIComponent(null == n ? "" : n);
        };
      if (null == e) return "";
      if (Array.isArray(e) || (e.jquery && !de.isPlainObject(e)))
        de.each(e, function () {
          o(this.name, this.value);
        });
      else for (n in e) Y(n, e[n], t, o);
      return r.join("&");
    }),
      de.fn.extend({
        serialize: function () {
          return de.param(this.serializeArray());
        },
        serializeArray: function () {
          return this.map(function () {
            var e = de.prop(this, "elements");
            return e ? de.makeArray(e) : this;
          })
            .filter(function () {
              var e = this.type;
              return (
                this.name &&
                !de(this).is(":disabled") &&
                kt.test(this.nodeName) &&
                !Pt.test(e) &&
                (this.checked || !Ge.test(e))
              );
            })
            .map(function (e, t) {
              var n = de(this).val();
              return null == n
                ? null
                : Array.isArray(n)
                ? de.map(n, function (e) {
                    return { name: t.name, value: e.replace(Nt, "\r\n") };
                  })
                : { name: t.name, value: n.replace(Nt, "\r\n") };
            })
            .get();
        },
      });
    var Dt = /%20/g,
      Mt = /#.*$/,
      Lt = /([?&])_=[^&]*/,
      Rt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
      _t = /^(?:GET|HEAD)$/,
      Ft = /^\/\//,
      qt = {},
      Bt = {},
      Wt = "*/".concat("*"),
      Ht = fe.createElement("a");
    (Ht.href = Ot.href),
      de.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
          url: Ot.href,
          type: "GET",
          isLocal:
            /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(
              Ot.protocol
            ),
          global: !0,
          processData: !0,
          async: !0,
          contentType: "application/x-www-form-urlencoded; charset=UTF-8",
          accepts: {
            "*": Wt,
            text: "text/plain",
            html: "text/html",
            xml: "application/xml, text/xml",
            json: "application/json, text/javascript",
          },
          contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
          responseFields: {
            xml: "responseXML",
            text: "responseText",
            json: "responseJSON",
          },
          converters: {
            "* text": String,
            "text html": !0,
            "text json": JSON.parse,
            "text xml": de.parseXML,
          },
          flatOptions: { url: !0, context: !0 },
        },
        ajaxSetup: function (e, t) {
          return t ? Z(Z(e, de.ajaxSettings), t) : Z(de.ajaxSettings, e);
        },
        ajaxPrefilter: V(qt),
        ajaxTransport: V(Bt),
        ajax: function (e, t) {
          function n(e, t, n, r) {
            var o,
              i,
              a,
              s,
              u,
              c = t;
            d ||
              ((d = !0),
              h && S.clearTimeout(h),
              (l = void 0),
              (p = r || ""),
              (A.readyState = 0 < e ? 4 : 0),
              (o = (200 <= e && e < 300) || 304 === e),
              n &&
                (s = (function (e, t, n) {
                  for (
                    var r, o, i, a, s = e.contents, u = e.dataTypes;
                    "*" === u[0];

                  )
                    u.shift(),
                      void 0 === r &&
                        (r = e.mimeType || t.getResponseHeader("Content-Type"));
                  if (r)
                    for (o in s)
                      if (s[o] && s[o].test(r)) {
                        u.unshift(o);
                        break;
                      }
                  if (u[0] in n) i = u[0];
                  else {
                    for (o in n) {
                      if (!u[0] || e.converters[o + " " + u[0]]) {
                        i = o;
                        break;
                      }
                      a || (a = o);
                    }
                    i = i || a;
                  }
                  if (i) return i !== u[0] && u.unshift(i), n[i];
                })(y, A, n)),
              !o &&
                -1 < de.inArray("script", y.dataTypes) &&
                (y.converters["text script"] = function () {}),
              (s = (function (e, t, n, r) {
                var o,
                  i,
                  a,
                  s,
                  u,
                  c = {},
                  l = e.dataTypes.slice();
                if (l[1])
                  for (a in e.converters) c[a.toLowerCase()] = e.converters[a];
                for (i = l.shift(); i; )
                  if (
                    (e.responseFields[i] && (n[e.responseFields[i]] = t),
                    !u &&
                      r &&
                      e.dataFilter &&
                      (t = e.dataFilter(t, e.dataType)),
                    (u = i),
                    (i = l.shift()))
                  )
                    if ("*" === i) i = u;
                    else if ("*" !== u && u !== i) {
                      if (!(a = c[u + " " + i] || c["* " + i]))
                        for (o in c)
                          if (
                            (s = o.split(" "))[1] === i &&
                            (a = c[u + " " + s[0]] || c["* " + s[0]])
                          ) {
                            !0 === a
                              ? (a = c[o])
                              : !0 !== c[o] && ((i = s[0]), l.unshift(s[1]));
                            break;
                          }
                      if (!0 !== a)
                        if (a && e["throws"]) t = a(t);
                        else
                          try {
                            t = a(t);
                          } catch (e) {
                            return {
                              state: "parsererror",
                              error: a
                                ? e
                                : "No conversion from " + u + " to " + i,
                            };
                          }
                    }
                return { state: "success", data: t };
              })(y, s, A, o)),
              o
                ? (y.ifModified &&
                    ((u = A.getResponseHeader("Last-Modified")) &&
                      (de.lastModified[f] = u),
                    (u = A.getResponseHeader("etag")) && (de.etag[f] = u)),
                  204 === e || "HEAD" === y.type
                    ? (c = "nocontent")
                    : 304 === e
                    ? (c = "notmodified")
                    : ((c = s.state), (i = s.data), (o = !(a = s.error))))
                : ((a = c), (!e && c) || ((c = "error"), e < 0 && (e = 0))),
              (A.status = e),
              (A.statusText = (t || c) + ""),
              o ? b.resolveWith(v, [i, c, A]) : b.rejectWith(v, [A, c, a]),
              A.statusCode(x),
              (x = void 0),
              g &&
                m.trigger(o ? "ajaxSuccess" : "ajaxError", [A, y, o ? i : a]),
              w.fireWith(v, [A, c]),
              g &&
                (m.trigger("ajaxComplete", [A, y]),
                --de.active || de.event.trigger("ajaxStop")));
          }
          "object" == typeof e && ((t = e), (e = void 0)), (t = t || {});
          var l,
            f,
            p,
            r,
            h,
            o,
            d,
            g,
            i,
            a,
            y = de.ajaxSetup({}, t),
            v = y.context || y,
            m = y.context && (v.nodeType || v.jquery) ? de(v) : de.event,
            b = de.Deferred(),
            w = de.Callbacks("once memory"),
            x = y.statusCode || {},
            s = {},
            u = {},
            c = "canceled",
            A = {
              readyState: 0,
              getResponseHeader: function (e) {
                var t;
                if (d) {
                  if (!r)
                    for (r = {}; (t = Rt.exec(p)); )
                      r[t[1].toLowerCase() + " "] = (
                        r[t[1].toLowerCase() + " "] || []
                      ).concat(t[2]);
                  t = r[e.toLowerCase() + " "];
                }
                return null == t ? null : t.join(", ");
              },
              getAllResponseHeaders: function () {
                return d ? p : null;
              },
              setRequestHeader: function (e, t) {
                return (
                  null == d &&
                    ((e = u[e.toLowerCase()] = u[e.toLowerCase()] || e),
                    (s[e] = t)),
                  this
                );
              },
              overrideMimeType: function (e) {
                return null == d && (y.mimeType = e), this;
              },
              statusCode: function (e) {
                var t;
                if (e)
                  if (d) A.always(e[A.status]);
                  else for (t in e) x[t] = [x[t], e[t]];
                return this;
              },
              abort: function (e) {
                var t = e || c;
                return l && l.abort(t), n(0, t), this;
              },
            };
          if (
            (b.promise(A),
            (y.url = ((e || y.url || Ot.href) + "").replace(
              Ft,
              Ot.protocol + "//"
            )),
            (y.type = t.method || t.type || y.method || y.type),
            (y.dataTypes = (y.dataType || "*").toLowerCase().match(Te) || [""]),
            null == y.crossDomain)
          ) {
            o = fe.createElement("a");
            try {
              (o.href = y.url),
                (o.href = o.href),
                (y.crossDomain =
                  Ht.protocol + "//" + Ht.host != o.protocol + "//" + o.host);
            } catch (e) {
              y.crossDomain = !0;
            }
          }
          if (
            (y.data &&
              y.processData &&
              "string" != typeof y.data &&
              (y.data = de.param(y.data, y.traditional)),
            X(qt, y, t, A),
            d)
          )
            return A;
          for (i in ((g = de.event && y.global) &&
            0 == de.active++ &&
            de.event.trigger("ajaxStart"),
          (y.type = y.type.toUpperCase()),
          (y.hasContent = !_t.test(y.type)),
          (f = y.url.replace(Mt, "")),
          y.hasContent
            ? y.data &&
              y.processData &&
              0 ===
                (y.contentType || "").indexOf(
                  "application/x-www-form-urlencoded"
                ) &&
              (y.data = y.data.replace(Dt, "+"))
            : ((a = y.url.slice(f.length)),
              y.data &&
                (y.processData || "string" == typeof y.data) &&
                ((f += (Et.test(f) ? "&" : "?") + y.data), delete y.data),
              !1 === y.cache &&
                ((f = f.replace(Lt, "$1")),
                (a = (Et.test(f) ? "&" : "?") + "_=" + jt.guid++ + a)),
              (y.url = f + a)),
          y.ifModified &&
            (de.lastModified[f] &&
              A.setRequestHeader("If-Modified-Since", de.lastModified[f]),
            de.etag[f] && A.setRequestHeader("If-None-Match", de.etag[f])),
          ((y.data && y.hasContent && !1 !== y.contentType) || t.contentType) &&
            A.setRequestHeader("Content-Type", y.contentType),
          A.setRequestHeader(
            "Accept",
            y.dataTypes[0] && y.accepts[y.dataTypes[0]]
              ? y.accepts[y.dataTypes[0]] +
                  ("*" !== y.dataTypes[0] ? ", " + Wt + "; q=0.01" : "")
              : y.accepts["*"]
          ),
          y.headers))
            A.setRequestHeader(i, y.headers[i]);
          if (y.beforeSend && (!1 === y.beforeSend.call(v, A, y) || d))
            return A.abort();
          if (
            ((c = "abort"),
            w.add(y.complete),
            A.done(y.success),
            A.fail(y.error),
            (l = X(Bt, y, t, A)))
          ) {
            if (((A.readyState = 1), g && m.trigger("ajaxSend", [A, y]), d))
              return A;
            y.async &&
              0 < y.timeout &&
              (h = S.setTimeout(function () {
                A.abort("timeout");
              }, y.timeout));
            try {
              (d = !1), l.send(s, n);
            } catch (e) {
              if (d) throw e;
              n(-1, e);
            }
          } else n(-1, "No Transport");
          return A;
        },
        getJSON: function (e, t, n) {
          return de.get(e, t, n, "json");
        },
        getScript: function (e, t) {
          return de.get(e, void 0, t, "script");
        },
      }),
      de.each(["get", "post"], function (e, o) {
        de[o] = function (e, t, n, r) {
          return (
            ce(t) && ((r = r || n), (n = t), (t = void 0)),
            de.ajax(
              de.extend(
                { url: e, type: o, dataType: r, data: t, success: n },
                de.isPlainObject(e) && e
              )
            )
          );
        };
      }),
      de.ajaxPrefilter(function (e) {
        var t;
        for (t in e.headers)
          "content-type" === t.toLowerCase() &&
            (e.contentType = e.headers[t] || "");
      }),
      (de._evalUrl = function (e, t, n) {
        return de.ajax({
          url: e,
          type: "GET",
          dataType: "script",
          cache: !0,
          async: !1,
          global: !1,
          converters: { "text script": function () {} },
          dataFilter: function (e) {
            de.globalEval(e, t, n);
          },
        });
      }),
      de.fn.extend({
        wrapAll: function (e) {
          var t;
          return (
            this[0] &&
              (ce(e) && (e = e.call(this[0])),
              (t = de(e, this[0].ownerDocument).eq(0).clone(!0)),
              this[0].parentNode && t.insertBefore(this[0]),
              t
                .map(function () {
                  for (var e = this; e.firstElementChild; )
                    e = e.firstElementChild;
                  return e;
                })
                .append(this)),
            this
          );
        },
        wrapInner: function (n) {
          return ce(n)
            ? this.each(function (e) {
                de(this).wrapInner(n.call(this, e));
              })
            : this.each(function () {
                var e = de(this),
                  t = e.contents();
                t.length ? t.wrapAll(n) : e.append(n);
              });
        },
        wrap: function (t) {
          var n = ce(t);
          return this.each(function (e) {
            de(this).wrapAll(n ? t.call(this, e) : t);
          });
        },
        unwrap: function (e) {
          return (
            this.parent(e)
              .not("body")
              .each(function () {
                de(this).replaceWith(this.childNodes);
              }),
            this
          );
        },
      }),
      (de.expr.pseudos.hidden = function (e) {
        return !de.expr.pseudos.visible(e);
      }),
      (de.expr.pseudos.visible = function (e) {
        return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
      }),
      (de.ajaxSettings.xhr = function () {
        try {
          return new S.XMLHttpRequest();
        } catch (e) {}
      });
    var Ut = { 0: 200, 1223: 204 },
      Jt = de.ajaxSettings.xhr();
    (ue.cors = !!Jt && "withCredentials" in Jt),
      (ue.ajax = Jt = !!Jt),
      de.ajaxTransport(function (o) {
        var i, a;
        if (ue.cors || (Jt && !o.crossDomain))
          return {
            send: function (e, t) {
              var n,
                r = o.xhr();
              if (
                (r.open(o.type, o.url, o.async, o.username, o.password),
                o.xhrFields)
              )
                for (n in o.xhrFields) r[n] = o.xhrFields[n];
              for (n in (o.mimeType &&
                r.overrideMimeType &&
                r.overrideMimeType(o.mimeType),
              o.crossDomain ||
                e["X-Requested-With"] ||
                (e["X-Requested-With"] = "XMLHttpRequest"),
              e))
                r.setRequestHeader(n, e[n]);
              (i = function (e) {
                return function () {
                  i &&
                    ((i =
                      a =
                      r.onload =
                      r.onerror =
                      r.onabort =
                      r.ontimeout =
                      r.onreadystatechange =
                        null),
                    "abort" === e
                      ? r.abort()
                      : "error" === e
                      ? "number" != typeof r.status
                        ? t(0, "error")
                        : t(r.status, r.statusText)
                      : t(
                          Ut[r.status] || r.status,
                          r.statusText,
                          "text" !== (r.responseType || "text") ||
                            "string" != typeof r.responseText
                            ? { binary: r.response }
                            : { text: r.responseText },
                          r.getAllResponseHeaders()
                        ));
                };
              }),
                (r.onload = i()),
                (a = r.onerror = r.ontimeout = i("error")),
                void 0 !== r.onabort
                  ? (r.onabort = a)
                  : (r.onreadystatechange = function () {
                      4 === r.readyState &&
                        S.setTimeout(function () {
                          i && a();
                        });
                    }),
                (i = i("abort"));
              try {
                r.send((o.hasContent && o.data) || null);
              } catch (e) {
                if (i) throw e;
              }
            },
            abort: function () {
              i && i();
            },
          };
      }),
      de.ajaxPrefilter(function (e) {
        e.crossDomain && (e.contents.script = !1);
      }),
      de.ajaxSetup({
        accepts: {
          script:
            "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
        },
        contents: { script: /\b(?:java|ecma)script\b/ },
        converters: {
          "text script": function (e) {
            return de.globalEval(e), e;
          },
        },
      }),
      de.ajaxPrefilter("script", function (e) {
        void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET");
      }),
      de.ajaxTransport("script", function (n) {
        var r, o;
        if (n.crossDomain || n.scriptAttrs)
          return {
            send: function (e, t) {
              (r = de("<script>")
                .attr(n.scriptAttrs || {})
                .prop({ charset: n.scriptCharset, src: n.url })
                .on(
                  "load error",
                  (o = function (e) {
                    r.remove(),
                      (o = null),
                      e && t("error" === e.type ? 404 : 200, e.type);
                  })
                )),
                fe.head.appendChild(r[0]);
            },
            abort: function () {
              o && o();
            },
          };
      });
    var Gt,
      zt = [],
      Yt = /(=)\?(?=&|$)|\?\?/;
    de.ajaxSetup({
      jsonp: "callback",
      jsonpCallback: function () {
        var e = zt.pop() || de.expando + "_" + jt.guid++;
        return (this[e] = !0), e;
      },
    }),
      de.ajaxPrefilter("json jsonp", function (e, t, n) {
        var r,
          o,
          i,
          a =
            !1 !== e.jsonp &&
            (Yt.test(e.url)
              ? "url"
              : "string" == typeof e.data &&
                0 ===
                  (e.contentType || "").indexOf(
                    "application/x-www-form-urlencoded"
                  ) &&
                Yt.test(e.data) &&
                "data");
        if (a || "jsonp" === e.dataTypes[0])
          return (
            (r = e.jsonpCallback =
              ce(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback),
            a
              ? (e[a] = e[a].replace(Yt, "$1" + r))
              : !1 !== e.jsonp &&
                (e.url += (Et.test(e.url) ? "&" : "?") + e.jsonp + "=" + r),
            (e.converters["script json"] = function () {
              return i || de.error(r + " was not called"), i[0];
            }),
            (e.dataTypes[0] = "json"),
            (o = S[r]),
            (S[r] = function () {
              i = arguments;
            }),
            n.always(function () {
              void 0 === o ? de(S).removeProp(r) : (S[r] = o),
                e[r] && ((e.jsonpCallback = t.jsonpCallback), zt.push(r)),
                i && ce(o) && o(i[0]),
                (i = o = void 0);
            }),
            "script"
          );
      }),
      (ue.createHTMLDocument =
        (((Gt = fe.implementation.createHTMLDocument("").body).innerHTML =
          "<form></form><form></form>"),
        2 === Gt.childNodes.length)),
      (de.parseHTML = function (e, t, n) {
        return "string" != typeof e
          ? []
          : ("boolean" == typeof t && ((n = t), (t = !1)),
            t ||
              (ue.createHTMLDocument
                ? (((r = (t =
                    fe.implementation.createHTMLDocument("")).createElement(
                    "base"
                  )).href = fe.location.href),
                  t.head.appendChild(r))
                : (t = fe)),
            (i = !n && []),
            (o = be.exec(e))
              ? [t.createElement(o[1])]
              : ((o = w([e], t, i)),
                i && i.length && de(i).remove(),
                de.merge([], o.childNodes)));
        var r, o, i;
      }),
      (de.fn.load = function (e, t, n) {
        var r,
          o,
          i,
          a = this,
          s = e.indexOf(" ");
        return (
          -1 < s && ((r = J(e.slice(s))), (e = e.slice(0, s))),
          ce(t)
            ? ((n = t), (t = void 0))
            : t && "object" == typeof t && (o = "POST"),
          0 < a.length &&
            de
              .ajax({ url: e, type: o || "GET", dataType: "html", data: t })
              .done(function (e) {
                (i = arguments),
                  a.html(r ? de("<div>").append(de.parseHTML(e)).find(r) : e);
              })
              .always(
                n &&
                  function (e, t) {
                    a.each(function () {
                      n.apply(this, i || [e.responseText, t, e]);
                    });
                  }
              ),
          this
        );
      }),
      (de.expr.pseudos.animated = function (t) {
        return de.grep(de.timers, function (e) {
          return t === e.elem;
        }).length;
      }),
      (de.offset = {
        setOffset: function (e, t, n) {
          var r,
            o,
            i,
            a,
            s,
            u,
            c = de.css(e, "position"),
            l = de(e),
            f = {};
          "static" === c && (e.style.position = "relative"),
            (s = l.offset()),
            (i = de.css(e, "top")),
            (u = de.css(e, "left")),
            ("absolute" === c || "fixed" === c) && -1 < (i + u).indexOf("auto")
              ? ((a = (r = l.position()).top), (o = r.left))
              : ((a = parseFloat(i) || 0), (o = parseFloat(u) || 0)),
            ce(t) && (t = t.call(e, n, de.extend({}, s))),
            null != t.top && (f.top = t.top - s.top + a),
            null != t.left && (f.left = t.left - s.left + o),
            "using" in t
              ? t.using.call(e, f)
              : ("number" == typeof f.top && (f.top += "px"),
                "number" == typeof f.left && (f.left += "px"),
                l.css(f));
        },
      }),
      de.fn.extend({
        offset: function (t) {
          if (arguments.length)
            return void 0 === t
              ? this
              : this.each(function (e) {
                  de.offset.setOffset(this, t, e);
                });
          var e,
            n,
            r = this[0];
          return r
            ? r.getClientRects().length
              ? ((e = r.getBoundingClientRect()),
                (n = r.ownerDocument.defaultView),
                { top: e.top + n.pageYOffset, left: e.left + n.pageXOffset })
              : { top: 0, left: 0 }
            : void 0;
        },
        position: function () {
          if (this[0]) {
            var e,
              t,
              n,
              r = this[0],
              o = { top: 0, left: 0 };
            if ("fixed" === de.css(r, "position"))
              t = r.getBoundingClientRect();
            else {
              for (
                t = this.offset(),
                  n = r.ownerDocument,
                  e = r.offsetParent || n.documentElement;
                e &&
                (e === n.body || e === n.documentElement) &&
                "static" === de.css(e, "position");

              )
                e = e.parentNode;
              e &&
                e !== r &&
                1 === e.nodeType &&
                (((o = de(e).offset()).top += de.css(e, "borderTopWidth", !0)),
                (o.left += de.css(e, "borderLeftWidth", !0)));
            }
            return {
              top: t.top - o.top - de.css(r, "marginTop", !0),
              left: t.left - o.left - de.css(r, "marginLeft", !0),
            };
          }
        },
        offsetParent: function () {
          return this.map(function () {
            for (
              var e = this.offsetParent;
              e && "static" === de.css(e, "position");

            )
              e = e.offsetParent;
            return e || Fe;
          });
        },
      }),
      de.each(
        { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
        function (t, o) {
          var i = "pageYOffset" === o;
          de.fn[t] = function (e) {
            return je(
              this,
              function (e, t, n) {
                var r;
                if (
                  (le(e) ? (r = e) : 9 === e.nodeType && (r = e.defaultView),
                  void 0 === n)
                )
                  return r ? r[o] : e[t];
                r
                  ? r.scrollTo(i ? r.pageXOffset : n, i ? n : r.pageYOffset)
                  : (e[t] = n);
              },
              t,
              e,
              arguments.length
            );
          };
        }
      ),
      de.each(["top", "left"], function (e, n) {
        de.cssHooks[n] = D(ue.pixelPosition, function (e, t) {
          if (t)
            return (t = k(e, n)), nt.test(t) ? de(e).position()[n] + "px" : t;
        });
      }),
      de.each({ Height: "height", Width: "width" }, function (a, s) {
        de.each(
          { padding: "inner" + a, content: s, "": "outer" + a },
          function (r, i) {
            de.fn[i] = function (e, t) {
              var n = arguments.length && (r || "boolean" != typeof e),
                o = r || (!0 === e || !0 === t ? "margin" : "border");
              return je(
                this,
                function (e, t, n) {
                  var r;
                  return le(e)
                    ? 0 === i.indexOf("outer")
                      ? e["inner" + a]
                      : e.document.documentElement["client" + a]
                    : 9 === e.nodeType
                    ? ((r = e.documentElement),
                      Math.max(
                        e.body["scroll" + a],
                        r["scroll" + a],
                        e.body["offset" + a],
                        r["offset" + a],
                        r["client" + a]
                      ))
                    : void 0 === n
                    ? de.css(e, t, o)
                    : de.style(e, t, n, o);
                },
                s,
                n ? e : void 0,
                n
              );
            };
          }
        );
      }),
      de.each(
        [
          "ajaxStart",
          "ajaxStop",
          "ajaxComplete",
          "ajaxError",
          "ajaxSuccess",
          "ajaxSend",
        ],
        function (e, t) {
          de.fn[t] = function (e) {
            return this.on(t, e);
          };
        }
      ),
      de.fn.extend({
        bind: function (e, t, n) {
          return this.on(e, null, t, n);
        },
        unbind: function (e, t) {
          return this.off(e, null, t);
        },
        delegate: function (e, t, n, r) {
          return this.on(t, e, n, r);
        },
        undelegate: function (e, t, n) {
          return 1 === arguments.length
            ? this.off(e, "**")
            : this.off(t, e || "**", n);
        },
        hover: function (e, t) {
          return this.mouseenter(e).mouseleave(t || e);
        },
      }),
      de.each(
        "blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(
          " "
        ),
        function (e, n) {
          de.fn[n] = function (e, t) {
            return 0 < arguments.length
              ? this.on(n, null, e, t)
              : this.trigger(n);
          };
        }
      );
    var Vt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    (de.proxy = function (e, t) {
      var n, r, o;
      if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), ce(e)))
        return (
          (r = $.call(arguments, 2)),
          ((o = function () {
            return e.apply(t || this, r.concat($.call(arguments)));
          }).guid = e.guid =
            e.guid || de.guid++),
          o
        );
    }),
      (de.holdReady = function (e) {
        e ? de.readyWait++ : de.ready(!0);
      }),
      (de.isArray = Array.isArray),
      (de.parseJSON = JSON.parse),
      (de.nodeName = c),
      (de.isFunction = ce),
      (de.isWindow = le),
      (de.camelCase = p),
      (de.type = y),
      (de.now = Date.now),
      (de.isNumeric = function (e) {
        var t = de.type(e);
        return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
      }),
      (de.trim = function (e) {
        return null == e ? "" : (e + "").replace(Vt, "");
      }),
      "function" == typeof define &&
        define.amd &&
        define("jquery", [], function () {
          return de;
        });
    var Xt = S.jQuery,
      Zt = S.$;
    return (
      (de.noConflict = function (e) {
        return (
          S.$ === de && (S.$ = Zt), e && S.jQuery === de && (S.jQuery = Xt), de
        );
      }),
      void 0 === e && (S.jQuery = S.$ = de),
      de
    );
  }),
  ((window.OpinionStage = window.OpinionStage || {}).$ = jQuery.noConflict(!0)),
  (function (e) {
    "use strict";
    function n(e, t) {
      "https://www.opinionstage.com" === t.origin &&
        e("object" == typeof t.data ? t.data : JSON.parse(t.data));
    }
    (e.CrossOriginComms = e.CrossOriginComms || {}),
      (e.CrossOriginComms.subscribe = function (e) {
        if ("function" != typeof e)
          throw new Error("callback must be a function");
        var t = n.bind(null, e);
        window.addEventListener
          ? window.addEventListener("message", t, !1)
          : window.attachEvent("onmessage", t);
      });
  })((window.OpinionStage = window.OpinionStage || {})),
  (function (e) {
    var t = "[OpinionStage]",
      n = {};
    "undefined" != typeof console &&
      (n = {
        error: console.error || console.log,
        warn: console.warn || console.log,
        info: console.info || console.log,
        debug: console.debug || console.log,
      }),
      (e.logger = {
        debug: function () {},
        info: function () {},
        warn: function () {},
        error: function () {},
        fatal: function () {},
      }),
      "function" == typeof n.debug &&
        (e.logger.debug = Function.prototype.bind.call(n.debug, console, t)),
      "function" == typeof n.info &&
        (e.logger.info = Function.prototype.bind.call(n.info, console, t)),
      "function" == typeof n.warn &&
        (e.logger.warn = Function.prototype.bind.call(n.warn, console, t)),
      "function" == typeof n.error &&
        (e.logger.error = Function.prototype.bind.call(n.error, console, t)),
      "function" == typeof n.error &&
        (e.logger.fatal = Function.prototype.bind.call(n.error, console, t));
  })((window.OpinionStage = window.OpinionStage || {})),
  (function (n, e) {
    function t(e) {
      if (o[e.type] !== undefined)
        for (i = 0; i < o[e.type].length; i++)
          try {
            o[e.type][i]({ name: e.type, data: e.data }, event.source),
              n.logger.debug("listener for", e.type, "done");
          } catch (t) {
            n.logger.error("failed invoking listener:", t);
          }
      else n.logger.debug("no listener for", e.type);
    }
    n.messenger = n.messenger || {};
    var r = !1,
      o = {};
    e.extend(n.messenger, {
      init: function a() {
        r
          ? n.logger.warn("messenger already initialized")
          : (n.CrossOriginComms.subscribe(t), (r = !0));
      },
      register: function s(e, t) {
        for (i = 0; i < e.length; i++) {
          var n = e[i];
          (o[n] = o[n] || []), o[n].push(t);
        }
      },
    });
  })(
    (window.OpinionStage = window.OpinionStage || {}),
    OpinionStage.$ || window.jQuery
  ),
  (function (a, e) {
    (a.renderer = a.renderer || {}),
      e.extend(a.renderer, {
        createSpinner: function (e, t, n) {
          var r = new Image(),
            o =
              "position:absolute; left:50%; margin-left:-16px; margin-top:-16px;width:auto !important;height:auto !important; min-width:auto;";
          if (
            (n || (o += "top:50%;"),
            (r.src =
              "data:image/gif;base64,R0lGODlhIAAgAPMAAP///wAAAMbGxoSEhLa2tpqamjY2NlZWVtjY2OTk5Ly8vB4eHgQEBAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAIAAgAAAE5xDISWlhperN52JLhSSdRgwVo1ICQZRUsiwHpTJT4iowNS8vyW2icCF6k8HMMBkCEDskxTBDAZwuAkkqIfxIQyhBQBFvAQSDITM5VDW6XNE4KagNh6Bgwe60smQUB3d4Rz1ZBApnFASDd0hihh12BkE9kjAJVlycXIg7CQIFA6SlnJ87paqbSKiKoqusnbMdmDC2tXQlkUhziYtyWTxIfy6BE8WJt5YJvpJivxNaGmLHT0VnOgSYf0dZXS7APdpB309RnHOG5gDqXGLDaC457D1zZ/V/nmOM82XiHRLYKhKP1oZmADdEAAAh+QQJCgAAACwAAAAAIAAgAAAE6hDISWlZpOrNp1lGNRSdRpDUolIGw5RUYhhHukqFu8DsrEyqnWThGvAmhVlteBvojpTDDBUEIFwMFBRAmBkSgOrBFZogCASwBDEY/CZSg7GSE0gSCjQBMVG023xWBhklAnoEdhQEfyNqMIcKjhRsjEdnezB+A4k8gTwJhFuiW4dokXiloUepBAp5qaKpp6+Ho7aWW54wl7obvEe0kRuoplCGepwSx2jJvqHEmGt6whJpGpfJCHmOoNHKaHx61WiSR92E4lbFoq+B6QDtuetcaBPnW6+O7wDHpIiK9SaVK5GgV543tzjgGcghAgAh+QQJCgAAACwAAAAAIAAgAAAE7hDISSkxpOrN5zFHNWRdhSiVoVLHspRUMoyUakyEe8PTPCATW9A14E0UvuAKMNAZKYUZCiBMuBakSQKG8G2FzUWox2AUtAQFcBKlVQoLgQReZhQlCIJesQXI5B0CBnUMOxMCenoCfTCEWBsJColTMANldx15BGs8B5wlCZ9Po6OJkwmRpnqkqnuSrayqfKmqpLajoiW5HJq7FL1Gr2mMMcKUMIiJgIemy7xZtJsTmsM4xHiKv5KMCXqfyUCJEonXPN2rAOIAmsfB3uPoAK++G+w48edZPK+M6hLJpQg484enXIdQFSS1u6UhksENEQAAIfkECQoAAAAsAAAAACAAIAAABOcQyEmpGKLqzWcZRVUQnZYg1aBSh2GUVEIQ2aQOE+G+cD4ntpWkZQj1JIiZIogDFFyHI0UxQwFugMSOFIPJftfVAEoZLBbcLEFhlQiqGp1Vd140AUklUN3eCA51C1EWMzMCezCBBmkxVIVHBWd3HHl9JQOIJSdSnJ0TDKChCwUJjoWMPaGqDKannasMo6WnM562R5YluZRwur0wpgqZE7NKUm+FNRPIhjBJxKZteWuIBMN4zRMIVIhffcgojwCF117i4nlLnY5ztRLsnOk+aV+oJY7V7m76PdkS4trKcdg0Zc0tTcKkRAAAIfkECQoAAAAsAAAAACAAIAAABO4QyEkpKqjqzScpRaVkXZWQEximw1BSCUEIlDohrft6cpKCk5xid5MNJTaAIkekKGQkWyKHkvhKsR7ARmitkAYDYRIbUQRQjWBwJRzChi9CRlBcY1UN4g0/VNB0AlcvcAYHRyZPdEQFYV8ccwR5HWxEJ02YmRMLnJ1xCYp0Y5idpQuhopmmC2KgojKasUQDk5BNAwwMOh2RtRq5uQuPZKGIJQIGwAwGf6I0JXMpC8C7kXWDBINFMxS4DKMAWVWAGYsAdNqW5uaRxkSKJOZKaU3tPOBZ4DuK2LATgJhkPJMgTwKCdFjyPHEnKxFCDhEAACH5BAkKAAAALAAAAAAgACAAAATzEMhJaVKp6s2nIkolIJ2WkBShpkVRWqqQrhLSEu9MZJKK9y1ZrqYK9WiClmvoUaF8gIQSNeF1Er4MNFn4SRSDARWroAIETg1iVwuHjYB1kYc1mwruwXKC9gmsJXliGxc+XiUCby9ydh1sOSdMkpMTBpaXBzsfhoc5l58Gm5yToAaZhaOUqjkDgCWNHAULCwOLaTmzswadEqggQwgHuQsHIoZCHQMMQgQGubVEcxOPFAcMDAYUA85eWARmfSRQCdcMe0zeP1AAygwLlJtPNAAL19DARdPzBOWSm1brJBi45soRAWQAAkrQIykShQ9wVhHCwCQCACH5BAkKAAAALAAAAAAgACAAAATrEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiRMDjI0Fd30/iI2UA5GSS5UDj2l6NoqgOgN4gksEBgYFf0FDqKgHnyZ9OX8HrgYHdHpcHQULXAS2qKpENRg7eAMLC7kTBaixUYFkKAzWAAnLC7FLVxLWDBLKCwaKTULgEwbLA4hJtOkSBNqITT3xEgfLpBtzE/jiuL04RGEBgwWhShRgQExHBAAh+QQJCgAAACwAAAAAIAAgAAAE7xDISWlSqerNpyJKhWRdlSAVoVLCWk6JKlAqAavhO9UkUHsqlE6CwO1cRdCQ8iEIfzFVTzLdRAmZX3I2SfZiCqGk5dTESJeaOAlClzsJsqwiJwiqnFrb2nS9kmIcgEsjQydLiIlHehhpejaIjzh9eomSjZR+ipslWIRLAgMDOR2DOqKogTB9pCUJBagDBXR6XB0EBkIIsaRsGGMMAxoDBgYHTKJiUYEGDAzHC9EACcUGkIgFzgwZ0QsSBcXHiQvOwgDdEwfFs0sDzt4S6BK4xYjkDOzn0unFeBzOBijIm1Dgmg5YFQwsCMjp1oJ8LyIAACH5BAkKAAAALAAAAAAgACAAAATwEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiUd6GGl6NoiPOH16iZKNlH6KmyWFOggHhEEvAwwMA0N9GBsEC6amhnVcEwavDAazGwIDaH1ipaYLBUTCGgQDA8NdHz0FpqgTBwsLqAbWAAnIA4FWKdMLGdYGEgraigbT0OITBcg5QwPT4xLrROZL6AuQAPUS7bxLpoWidY0JtxLHKhwwMJBTHgPKdEQAACH5BAkKAAAALAAAAAAgACAAAATrEMhJaVKp6s2nIkqFZF2VIBWhUsJaTokqUCoBq+E71SRQeyqUToLA7VxF0JDyIQh/MVVPMt1ECZlfcjZJ9mIKoaTl1MRIl5o4CUKXOwmyrCInCKqcWtvadL2SYhyASyNDJ0uIiUd6GAULDJCRiXo1CpGXDJOUjY+Yip9DhToJA4RBLwMLCwVDfRgbBAaqqoZ1XBMHswsHtxtFaH1iqaoGNgAIxRpbFAgfPQSqpbgGBqUD1wBXeCYp1AYZ19JJOYgH1KwA4UBvQwXUBxPqVD9L3sbp2BNk2xvvFPJd+MFCN6HAAIKgNggY0KtEBAAh+QQJCgAAACwAAAAAIAAgAAAE6BDISWlSqerNpyJKhWRdlSAVoVLCWk6JKlAqAavhO9UkUHsqlE6CwO1cRdCQ8iEIfzFVTzLdRAmZX3I2SfYIDMaAFdTESJeaEDAIMxYFqrOUaNW4E4ObYcCXaiBVEgULe0NJaxxtYksjh2NLkZISgDgJhHthkpU4mW6blRiYmZOlh4JWkDqILwUGBnE6TYEbCgevr0N1gH4At7gHiRpFaLNrrq8HNgAJA70AWxQIH1+vsYMDAzZQPC9VCNkDWUhGkuE5PxJNwiUK4UfLzOlD4WvzAHaoG9nxPi5d+jYUqfAhhykOFwJWiAAAIfkECQoAAAAsAAAAACAAIAAABPAQyElpUqnqzaciSoVkXVUMFaFSwlpOCcMYlErAavhOMnNLNo8KsZsMZItJEIDIFSkLGQoQTNhIsFehRww2CQLKF0tYGKYSg+ygsZIuNqJksKgbfgIGepNo2cIUB3V1B3IvNiBYNQaDSTtfhhx0CwVPI0UJe0+bm4g5VgcGoqOcnjmjqDSdnhgEoamcsZuXO1aWQy8KAwOAuTYYGwi7w5h+Kr0SJ8MFihpNbx+4Erq7BYBuzsdiH1jCAzoSfl0rVirNbRXlBBlLX+BP0XJLAPGzTkAuAOqb0WT5AH7OcdCm5B8TgRwSRKIHQtaLCwg1RAAAOwAAAAAAAAAAADxiciAvPgo8Yj5XYXJuaW5nPC9iPjogIG15c3FsX3F1ZXJ5KCkgWzxhIGhyZWY9J2Z1bmN0aW9uLm15c3FsLXF1ZXJ5Jz5mdW5jdGlvbi5teXNxbC1xdWVyeTwvYT5dOiBDYW4ndCBjb25uZWN0IHRvIGxvY2FsIE15U1FMIHNlcnZlciB0aHJvdWdoIHNvY2tldCAnL3Zhci9ydW4vbXlzcWxkL215c3FsZC5zb2NrJyAoMikgaW4gPGI+L2hvbWUvYWpheGxvYWQvd3d3L2xpYnJhaXJpZXMvY2xhc3MubXlzcWwucGhwPC9iPiBvbiBsaW5lIDxiPjY4PC9iPjxiciAvPgo8YnIgLz4KPGI+V2FybmluZzwvYj46ICBteXNxbF9xdWVyeSgpIFs8YSBocmVmPSdmdW5jdGlvbi5teXNxbC1xdWVyeSc+ZnVuY3Rpb24ubXlzcWwtcXVlcnk8L2E+XTogQSBsaW5rIHRvIHRoZSBzZXJ2ZXIgY291bGQgbm90IGJlIGVzdGFibGlzaGVkIGluIDxiPi9ob21lL2FqYXhsb2FkL3d3dy9saWJyYWlyaWVzL2NsYXNzLm15c3FsLnBocDwvYj4gb24gbGluZSA8Yj42ODwvYj48YnIgLz4KPGJyIC8+CjxiPldhcm5pbmc8L2I+OiAgbXlzcWxfcXVlcnkoKSBbPGEgaHJlZj0nZnVuY3Rpb24ubXlzcWwtcXVlcnknPmZ1bmN0aW9uLm15c3FsLXF1ZXJ5PC9hPl06IENhbid0IGNvbm5lY3QgdG8gbG9jYWwgTXlTUUwgc2VydmVyIHRocm91Z2ggc29ja2V0ICcvdmFyL3J1bi9teXNxbGQvbXlzcWxkLnNvY2snICgyKSBpbiA8Yj4vaG9tZS9hamF4bG9hZC93d3cvbGlicmFpcmllcy9jbGFzcy5teXNxbC5waHA8L2I+IG9uIGxpbmUgPGI+Njg8L2I+PGJyIC8+CjxiciAvPgo8Yj5XYXJuaW5nPC9iPjogIG15c3FsX3F1ZXJ5KCkgWzxhIGhyZWY9J2Z1bmN0aW9uLm15c3FsLXF1ZXJ5Jz5mdW5jdGlvbi5teXNxbC1xdWVyeTwvYT5dOiBBIGxpbmsgdG8gdGhlIHNlcnZlciBjb3VsZCBub3QgYmUgZXN0YWJsaXNoZWQgaW4gPGI+L2hvbWUvYWpheGxvYWQvd3d3L2xpYnJhaXJpZXMvY2xhc3MubXlzcWwucGhwPC9iPiBvbiBsaW5lIDxiPjY4PC9iPjxiciAvPgo8YnIgLz4KPGI+V2FybmluZzwvYj46ICBteXNxbF9xdWVyeSgpIFs8YSBocmVmPSdmdW5jdGlvbi5teXNxbC1xdWVyeSc+ZnVuY3Rpb24ubXlzcWwtcXVlcnk8L2E+XTogQ2FuJ3QgY29ubmVjdCB0byBsb2NhbCBNeVNRTCBzZXJ2ZXIgdGhyb3VnaCBzb2NrZXQgJy92YXIvcnVuL215c3FsZC9teXNxbGQuc29jaycgKDIpIGluIDxiPi9ob21lL2FqYXhsb2FkL3d3dy9saWJyYWlyaWVzL2NsYXNzLm15c3FsLnBocDwvYj4gb24gbGluZSA8Yj42ODwvYj48YnIgLz4KPGJyIC8+CjxiPldhcm5pbmc8L2I+OiAgbXlzcWxfcXVlcnkoKSBbPGEgaHJlZj0nZnVuY3Rpb24ubXlzcWwtcXVlcnknPmZ1bmN0aW9uLm15c3FsLXF1ZXJ5PC9hPl06IEEgbGluayB0byB0aGUgc2VydmVyIGNvdWxkIG5vdCBiZSBlc3RhYmxpc2hlZCBpbiA8Yj4vaG9tZS9hamF4bG9hZC93d3cvbGlicmFpcmllcy9jbGFzcy5teXNxbC5waHA8L2I+IG9uIGxpbmUgPGI+Njg8L2I+PGJyIC8+Cg=="),
            (r.style.cssText = o),
            (r.className = e),
            t)
          ) {
            var i = document.createElement("div");
            return (
              (i.className = "os-spinner-container"),
              (i.style.cssText = "position:relative;height: 25px;"),
              i.appendChild(r),
              i
            );
          }
          return r;
        },
        createIframe: function (e, t, n, r) {
          var o = document.createElement("iframe"),
            i = "border: none; margin-bottom: 0 !important;";
          return (
            "100%" == t
              ? (i += " width: 1px; min-width: 100%; max-width: 640px;")
              : o.setAttribute("width", t),
            o.setAttribute("height", n),
            o.setAttribute("frameBorder", "0"),
            o.setAttribute("scrolling", "no"),
            o.setAttribute("style", i),
            o.setAttribute("src", e),
            o.setAttribute("name", "opinionstage-widget"),
            o.setAttribute("data-opinionstage-iframe", r),
            o.setAttribute("webkitallowfullscreen", ""),
            o.setAttribute("mozallowfullscreen", ""),
            o.setAttribute("allowfullscreen", ""),
            o.setAttribute("referrerpolicy", "no-referrer-when-downgrade"),
            o
          );
        },
        insertIframe: function (e, t, n, r, o) {
          var i = a.renderer.createIframe(e, t, n, o);
          r.insertBefore(i, r.firstChild), a.logger.info("rendered iframe:", i);
        },
      });
  })(
    (window.OpinionStage = window.OpinionStage || {}),
    OpinionStage.$ || window.jQuery
  ),
  (function (e, t) {
    (e.core = e.core || {}),
      t.extend(e.core, {
        isMobile: function () {
          var e = window.navigator.userAgent;
          return (
            /Mobile|webOS|BlackBerry|SymbianOS/i.test(e) && !/iPad/i.test(e)
          );
        },
        encode: function (e) {
          return encodeURIComponent(e)
            .replace("!", "%21")
            .replace("'", "%27")
            .replace("~", "%7E")
            .replace("(", "%28")
            .replace(")", "%29")
            .replace("-", "%2D");
        },
      });
  })(
    (window.OpinionStage = window.OpinionStage || {}),
    OpinionStage.$ || window.jQuery
  ),
  (function (e, t) {
    (e.config = e.config || {}),
      t.extend(e.config, {
        protocol: "https://",
        host: "www.opinionstage.com",
        hostWithProtocol: function () {
          return this.protocol + this.host;
        },
        widgetTopContainerClass: "os_widget_container",
        widgetDivClass: "os_widget",
        pollDivClass: "os_poll",
        spinnerClass: "os_spinner",
        isMobile: e.core.isMobile(),
        pollUrl: function (e, t) {
          return this.hostWithProtocol() + e + "/poll?sembed=1&wid=" + t;
        },
      });
  })((window.OpinionStage = window.OpinionStage || {}), OpinionStage.$),
  (function (y, v) {
    function m(e) {
      var t = e.getAttribute("data-width");
      return (t && 0 < parseInt(t)) || (t = "100%"), t;
    }
    function b(e, t) {
      (e.style.position = "relative"), (e.style.minHeight = "200px");
      var n = document.createElement("div");
      return (
        (n.className =
          y.config.widgetTopContainerClass +
          " " +
          (y.config.widgetTopContainerClass + t)),
        (n.style.clear = "both"),
        n.appendChild(y.renderer.createSpinner(y.config.spinnerClass)),
        e.appendChild(n),
        n
      );
    }
    function i(e, t) {
      var n = m(e),
        r = e.getAttribute("data-height") || "0",
        o = e.getAttribute("data-path"),
        i = e.getAttribute("data-opinionstage-widget"),
        a = b(e, t);
      y.renderer.insertIframe(y.config.pollUrl(o, t), n, r, a, i);
    }
    function a(e, t, n) {
      var r = m(e),
        o = w(e) || t,
        i = e.getAttribute("data-opinionstage-widget"),
        a = e.getAttribute("data-height") || "0",
        s = "false" === e.getAttribute("data-comments") ? "0" : null,
        u = e.getAttribute("data-path"),
        c = e.getAttribute("data-of") || "",
        l = "false" === e.getAttribute("data-autoswitch") ? "0" : "1",
        f = n || u,
        p = new URLSearchParams(window.location.search).get("os_utm_source"),
        h = y.config.hostWithProtocol() + f,
        d = {
          wid: t,
          em: "1",
          comments: s,
          referring_widget: u,
          autoswitch: l,
          of: c,
          os_utm_source: p,
        },
        g = b(e, t);
      return y.renderer.insertIframe(h + "?" + v.param(d), r, a, g, i), o;
    }
    function e() {
      var e = v("." + y.config.widgetDivClass + ":not([data-rendering])"),
        t = v("." + y.config.pollDivClass + ":not([data-rendering])");
      if (0 !== e.length || 0 !== t.length) {
        var o = v("[data-rendering='completed']").length - 1;
        e.attr("data-rendering", "queue"),
          t.attr("data-rendering", "queue"),
          y.logger.info(
            "rendering widgets; polls:",
            t.length,
            ", widgets:",
            e.length
          ),
          v.each(e, function (e, t) {
            var n = v(t);
            o += 1;
            var r = n.data("path") + "-" + o;
            a(t, r), (u[r] = t);
          }),
          e.attr("data-rendering", "completed"),
          v.each(t, function (e, t) {
            if (t.getAttribute("data-path")) {
              var n = v(t);
              o += 1;
              var r = n.data("path") + "-" + o;
              i(t, r), (u[r] = t);
            } else y.logger.warn("aborting poll render, legacy embed");
          }),
          t.attr("data-rendering", "completed");
      }
    }
    function s(e) {
      return u[e];
    }
    function w(e) {
      var t = v(e).attr("id");
      return t && "string" == typeof t && 0 < t.length
        ? Number(t.match(/\d+/)[0])
        : null;
    }
    y.renderer = y.renderer || {};
    var u = {};
    v.extend(y.renderer, {
      renderAll: e,
      removeSpinner: function n(e) {
        var t = s(e);
        v(t)
          .find("." + y.config.spinnerClass)
          .remove(),
          v(t).find("os-spinner-container").remove();
      },
      resizeIframe: function c(e, t) {
        var n = s(e);
        if (n) {
          var r = n.getElementsByTagName("IFRAME")[0],
            o = n.getAttribute("data-width"),
            i =
              "opacity: 1;border: none;margin: auto;height:" +
              t +
              "px;max-height:" +
              t +
              "px !important;";
          (o && 0 < parseInt(o)) ||
            (i += "width: 1px;min-width: 100%;max-width: 640px"),
            (r.style.cssText = i);
        }
      },
      resetScroll: function r(e) {
        var t = s(e),
          n = 60;
        v("html, body").animate({ scrollTop: v(t).offset().top - n }, 400);
      },
      renderOutframeContent: function o(e, t) {
        if (t) {
          var n = s(e);
          v.get(
            y.config.hostWithProtocol() +
              "/widgets/api/widgets/" +
              t +
              "/embedding.json",
            function (e) {
              e.out_of_frame.enabled && v(n).append(e.out_of_frame.content),
                "string" == typeof e.top_ads &&
                  0 < e.top_ads.length &&
                  v(n).before(e.top_ads),
                "string" == typeof e.bottom_ads &&
                  0 < e.bottom_ads.length &&
                  v(n).after(e.bottom_ads);
            }
          );
        } else y.logger.warn("legacy embed: ads render disabled");
      },
    });
  })((window.OpinionStage = window.OpinionStage || {}), OpinionStage.$),
  ((window.OpinionStage = window.OpinionStage || {}).events = {
    widgetLoaded: "widgetLoaded",
    heightChanged: "heightChanged",
    leadFormSubmitted: "leadFormSubmitted",
    leadFormSkipped: "leadFormSkipped",
    startEngagementClicked: "startEngagementClicked",
    engagementEnded: "engagementEnded",
    selectionsFinished: "selectionsFinished",
    resultCalculated: "resultCalculated",
    cardOptionClicked: "cardOptionClicked",
    cardContinueClicked: "cardContinueClicked",
    cardEngagementEnded: "cardEngagementEnded",
    cardChanged: "cardChanged",
    retakeClicked: "retakeClicked",
    scrollRequired: "scrollRequired",
    cardAnimationCompleted: "cardAnimationCompleted",
    cardNextExplanationClicked: "cardNextExplanationClicked",
    textInputChanged: "textInputChanged",
    variableUpdated: "variableUpdated",
    closingCardPresented: "closingCardPresented",
    pollSetHeightChanged: "pollSetHeightChanged",
    voted: "pollVote",
    redirectRequired: "redirect",
    applyConfig: "applyConfiguration",
    startResizing: "startResizing",
    stopResizing: "stopResizing",
  });
var _createClass = (function () {
  function r(e, t) {
    for (var n = 0; n < t.length; n++) {
      var r = t[n];
      (r.enumerable = r.enumerable || !1),
        (r.configurable = !0),
        "value" in r && (r.writable = !0),
        Object.defineProperty(e, r.key, r);
    }
  }
  return function (e, t, n) {
    return t && r(e.prototype, t), n && r(e, n), e;
  };
})();
!(function (o) {
  function n() {
    (this.observer = new MutationObserver(function () {
      o.renderer.renderAll();
    })),
      this.observer.observe(document.body, { childList: !0, subtree: !0 });
  }
  function r(e) {
    e.data.embedID
      ? o.renderer.removeSpinner(e.data.embedID)
      : o.logger.warn("embedID is missing:", e);
  }
  function i(e) {
    var t = e.data.embedID;
    if (t) {
      var n = e.data.height,
        r = e.data.src_id;
      (c[t] = c[t] || 0),
        (c[t] += 1),
        o.renderer.resizeIframe(t, n),
        1 === c[t] && o.renderer.renderOutframeContent(t, r);
    }
  }
  function a(e) {
    o.renderer.resetScroll(e.data.embedID);
  }
  function s(e) {
    e.data.page_reload
      ? ((window.location.hash = e.data.src_id), window.location.reload())
      : e.data.same_window
      ? (window.location.href = e.data.url)
      : window.open(e.data.url);
  }
  function u(e) {
    e.data.gtm_trackable &&
      ("undefined" == typeof window.dataLayer && (dataLayer = []),
      dataLayer.push({ event: e.name, OS_data: e.data }));
  }
  var e = (function () {
    function e() {
      _classCallCheck(this, e), (this.initialized = !1), (this.observer = null);
    }
    return (
      _createClass(e, [
        {
          key: "start",
          value: function t() {
            this.initialized
              ? o.logger.warn("loader initialization was already done")
              : ((this.initialized = !0),
                o.messenger.init(),
                o.messenger.register([o.events.widgetLoaded], r),
                o.messenger.register([o.events.heightChanged], i),
                o.messenger.register([o.events.redirectRequired], s),
                o.messenger.register([o.events.scrollRequired], a),
                o.messenger.register(
                  [
                    o.events.cardOptionClicked,
                    o.events.resultCalculated,
                    o.events.closingCardPresented,
                  ],
                  u
                ),
                o.renderer.renderAll(),
                n.call(this));
          },
        },
      ]),
      e
    );
  })();
  o.Loader = e;
  var c = {};
})((window.OpinionStage = window.OpinionStage || {})),
  OpinionStage.loader || (OpinionStage.loader = new OpinionStage.Loader()),
  OpinionStage.loader.start();
// alert(e.nodeName);