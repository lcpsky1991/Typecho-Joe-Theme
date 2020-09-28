<audio id="hoverMusic" autoplay="autoplay"></audio>
<script>
    $(function() {
        /* 取随机数的函数 */
        function random(t, n) {
            return Math.floor(Math.random() * (n - t + 1)) + t
        }
        $("#headNavLink a").on("mouseover", function() {
            $("#hoverMusic").attr("src", "<?php echo theurl ?>assets/ogv/" + random(1, 8) + ".ogv")
        })
    })
</script>