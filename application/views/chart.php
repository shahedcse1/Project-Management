<script type="text/javascript">
    var Project = function Project() {

        return {
            init: function () {

                    0 != $("#projectData").length && new Chartist.Pie("#projectData", {
                            series: [
                                {
                                    value: '<?=  $activeProject ?>',
                                    className: "custom",
                                    meta: {color: mApp.getColor("primary")}
                                }, {
                                    value: '<?= $inactiveProject ?>',
                                    className: "custom",
                                    meta: {color: mApp.getColor("danger")}
                                },
                            ], labels: [1, 2, 3]
                        },
                        {donut: !0, donutWidth: 17, showLabel: !1}).on("draw", function (e) {
                        if ("slice" === e.type) {
                            var t = e.element._node.getTotalLength();
                            e.element.attr({"stroke-dasharray": t + "px " + t + "px"});
                            var a = {
                                "stroke-dashoffset": {
                                    id: "anim" + e.index,
                                    dur: 1e3,
                                    from: -t + "px",
                                    to: "0px",
                                    easing: Chartist.Svg.Easing.easeOutQuint,
                                    fill: "freeze",
                                    stroke: e.meta.color
                                }
                            };
                            0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                                "stroke-dashoffset": -t + "px",
                                stroke: e.meta.color
                            }), e.element.animate(a, !1)
                        }
                    })
            },
    }
    }();
var  Task= function  Task() {

        return {
            init: function () {

                    0 != $("#taskData").length && new Chartist.Pie("#taskData", {
                            series: [
                                {
                                    value: '<?=  $activeTask ?>',
                                    className: "custom",
                                    meta: {color: mApp.getColor("primary")}
                                }, {
                                    value: '<?= $inactiveTask ?>',
                                    className: "custom",
                                    meta: {color: mApp.getColor("danger")}
                                },
                            ], labels: [1, 2, 3]
                        },
                        {donut: !0, donutWidth: 17, showLabel: !1}).on("draw", function (e) {
                        if ("slice" === e.type) {
                            var t = e.element._node.getTotalLength();
                            e.element.attr({"stroke-dasharray": t + "px " + t + "px"});
                            var a = {
                                "stroke-dashoffset": {
                                    id: "anim" + e.index,
                                    dur: 1e3,
                                    from: -t + "px",
                                    to: "0px",
                                    easing: Chartist.Svg.Easing.easeOutQuint,
                                    fill: "freeze",
                                    stroke: e.meta.color
                                }
                            };
                            0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                                "stroke-dashoffset": -t + "px",
                                stroke: e.meta.color
                            }), e.element.animate(a, !1)
                        }
                    })
            },
    }
    }();

    jQuery(document).ready(function () {
        Project.init();
        Task.init();
    });


    document.addEventListener("DOMContentLoaded", function (event) {

        var graph1 = new JustGage({
            id: 'graph1',
            value: '<?=  $progress  ?>',
            min: 0,
            max: '<?=  $total  ?>',
            pointer: true,
            title: "Progress Total",
            hideMinMax: true,
            titleFontColor: "#000000",
            donut: true,
            counter: true,
            levelColors: ['#f4b642']
        });

        var graph2 = new JustGage({
            id: 'graph2',
            value: '<?=  $complete  ?>',
            min: 0,
            max: '<?=  $total  ?>',
            pointer: true,
            title: "Complete Total",
            hideMinMax: true,
            titleFontColor: "#000000",
            donut: true,
            counter: true,
            levelColors: ['#9251e8']
        });

        var graph3 = new JustGage({
            id: 'graph3',
            value: '<?=  $closed  ?>',
            min: 0,
            max: '<?=  $total  ?>',
            pointer: true,
            title: "Closed Total",
            hideMinMax: true,
            titleFontColor: "#000000",
            donut: true,
            counter: true,
            levelColors: ['#65478c']
        });

        var graph4 = new JustGage({
            id: 'graph4',
            value: '<?=  $total  ?>',
            min: 0,
            max: '<?=  $total  ?>',
            pointer: true,
            title: "Total Task",
            hideMinMax: true,
            titleFontColor: "#000000",
            donut: true,
            counter: true,
            levelColors: ['#197D19']
        });
    });
</script>