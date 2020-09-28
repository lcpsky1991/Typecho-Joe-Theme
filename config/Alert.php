<script>
    $(function() {
        if (!$.cookie("j-alert")) {
            setTimeout(function() {
                $("#dayAlert").addClass("active")
                $("#dayContent").addClass("active")
                $("body").css("overflow", "hidden")
            }, 1000)
        }
        $("#dayContent button").on("click", function() {
            $("#dayAlert").removeClass("active")
            $("#dayContent").removeClass("active")
            $("body").css("overflow", "")
            $.cookie('j-alert', 'open', {
                expires: 1
            });
        })
    })
</script>