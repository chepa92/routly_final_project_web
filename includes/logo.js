$(function() {
    "use strict";
    var t = {
        init: function(t) {
            var i = $(t)
              , n = i.length;
            if (0 == n)
                return void console.warn("Элемент " + t + " не найден");
            this.eachObj(i, n)
        },
        eachObj: function(t, i) {
            for (var n = 0; n < i; n++)
                this.getParam(t.eq(n))
        },
        getParam: function(t) {
            var i = t.data("image");
            this.generateImg(t, i)
        },
        generateImg: function(e, o) {
            var a, s, r = new Image;
            r.onload = function() {
                s = r.width / 2,
                a = r.width / 2,
                r.width = s,
                r.height = a,
                setTimeout(function() {
                    e.append(r),
                    t.firstAnimationUp(r),
                    t.randomPosition(e, r, s, a),
                    t.interval(e, r, a)
                }, 10)
            }
            ,
            r.src = o,
            r.classList.add(i),
            r.classList.add("_up"),
            $(r).on("mouseenter", function() {
                var i = $(r);
                t.verticalToggleVisible(i, 0),
                setTimeout(function() {
                    t.randomPosition(e, r, s, a)
                }, 250),
                setTimeout(function() {
                    t.verticalToggleVisible(i, 100)
                }, 2250),
                n = 0
            })
        },
        firstAnimationUp: function(t) {
            setTimeout(function() {
                $(t).css({
                    transform: "translateY(-100%)"
                })
            }, 10)
        },
        randomPosition: function(t, i, n, e) {
            var o = t.width()
              , a = this.randomInteger(0, o);
            a + n > o && (a -= a + n - o),
            $(i).css({
                left: a
            })
        },
        randomInteger: function(t, i) {
            var n = t + Math.random() * (i + 1 - t);
            return n = Math.floor(n)
        },
        interval: function(i, e, o) {
            var e = $(e)
              , a = setTimeout(function s() {
                if (e.position().top == i.outerHeight() - o)
                    switch (++n) {
                    case 1:
                        t.hidingWithAutoReturn(e, 65, 1e3);
                        break;
                    case 2:
                        t.hidingWithAutoReturn(e, 20, 1e3);
                        break;
                    case 3:
                        t.hidingWithAutoReturn(e, 0, 1e3)
                    }
                if (3 == n) {
                    n = 0;
                    var r = e.width()
                      , u = e.height();
                    setTimeout(function() {
                        t.randomPosition(i, e, r, u)
                    }, 250)
                }
                a = setTimeout(s, 400)
            }, 400)
        },
        verticalToggleVisible: function(t, i) {
            t.toggleClass("_down _up").css({
                transform: "translateY(-" + i + "%)"
            })
        },
        hidingWithAutoReturn: function(i, n, e) {
            this.verticalToggleVisible(i, n),
            setTimeout(function() {
                t.verticalToggleVisible(i, 100)
            }, e)
        },
        stopFunction: function() {
            t.verticalToggleVisible($("." + i), 0)
        }
    };
    const i = "hide-and-seek-animals__image";
    var n = 0;
    t.init(".hide-and-seek-animals")
});
