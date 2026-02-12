(function($) {
    var pxl_widget_tabs_handler = function($scope, $) {
        var $tabs = $scope.find(".pxl-tabs");

        $tabs.each(function() {
            var $tabContainer = $(this);
            var $titles = $tabContainer.find(".pxl-tabs--title .pxl-item--title");
            var $contents = $tabContainer.find(".pxl-tabs--content .pxl-item--content");

            function activateTab(index) {
                if (index < 0) index = $titles.length - 1; 
                if (index >= $titles.length) index = 0; 

                var $newActiveTitle = $titles.eq(index);
                var target = $newActiveTitle.data("target");
                var $newActiveContent = $(target);

                if (!$newActiveContent.length) return;

                if ($tabContainer.hasClass("tab-effect-slide")) {
                    $contents.stop(true, true).slideUp(300);
                    $newActiveContent.stop(true, true).slideDown(300);
                } else if ($tabContainer.hasClass("tab-effect-fade")) {
                    $contents.removeClass("active").fadeOut(200);
                    $newActiveContent.fadeIn(200).addClass("active");
                }

                $titles.removeClass("active");
                $newActiveTitle.addClass("active");
            }

            $titles.on("click", function(e) {
                e.preventDefault();
                var index = $titles.index(this);
                activateTab(index);
            });

            $tabContainer.find(".pxl-tabs-next").on("click", function() {
                var index = $titles.index($tabContainer.find(".pxl-tabs--title .pxl-item--title.active"));
                activateTab(index + 1);
            });

            $tabContainer.find(".pxl-tabs-prev").on("click", function() {
                var index = $titles.index($tabContainer.find(".pxl-tabs--title .pxl-item--title.active"));
                activateTab(index - 1);
            });
        });
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_tabs.default', pxl_widget_tabs_handler);
    });
})(jQuery);
