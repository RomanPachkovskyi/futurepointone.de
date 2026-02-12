( function( $ ) {

         //animation
    function vintech_animation_handler($scope){   
        elementorFrontend.waypoint($(document).find('.pxl-animate'), function () {
            var $animate_el = $(this),
            data = $animate_el.data('settings');  
            if(typeof data != 'undefined' && typeof data['animation'] != 'undefined'){
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                }, data['animation_delay']);
            }else{
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated fadeInUp');
                }, 300);
            }
        });

        elementorFrontend.waypoint($scope.find('.pxl-border-animated'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.PXLfadeInUp,.PXLZoom2'), function () {
            $(this).addClass('pxl-animated');
        });
    }

    function vintech_section_start_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        
        _elementor.hooks.addFilter( 'pxl_element_container/before-render', function( html, settings ) {
            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){
                html += '<div class="pxl-section-bg-parallax"></div>';
            }

            if(typeof settings.pxl_color_offset != 'undefined' && settings.pxl_color_offset != 'none'){
                html += '<div class="pxl-section-overlay-color"></div>';
            }

            if(typeof settings.pxl_overlay_img != 'undefined' && settings.pxl_overlay_img.url != ''){
                html += '<div class="pxl-overlay--image pxl-overlay--imageLeft"><div class="bg-image"></div></div>';
            }

            if(typeof settings.pxl_overlay_img2 != 'undefined' && settings.pxl_overlay_img2.url != ''){
                html += '<div class="pxl-overlay--image pxl-overlay--imageRight"><div class="bg-image"></div></div>';
            }

            return html;
        } );

        $('.pxl-section-bg-parallax').closest('.elementor-element').addClass('pxl-section-parallax-overflow');
    }

    function vintech_css_inline_js(){
        var _inline_css = "<style>";
        $(document).find('.pxl-inline-css').each(function () {
            var _this = $(this);
            _inline_css += _this.attr("data-css") + " ";
            _this.remove();
        });
        _inline_css += "</style>";
        $('head').append(_inline_css);
    }

    function vintech_section_before_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-section/before-render', function( html, settings, el ) {
            if (typeof settings['row_divider'] !== 'undefined') {
                if(settings['row_divider'] == 'angle-top' || settings['row_divider'] == 'angle-bottom' || settings['row_divider'] == 'angle-top-right' || settings['row_divider'] == 'angle-bottom-left') {
                    html =  '<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'angle-top-bottom' || settings['row_divider'] == 'angle-top-bottom-left') {
                    html =  '<svg class="pxl-row-angle pxl-row-angle-top" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg><svg class="pxl-row-angle pxl-row-angle-bottom" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'wave-animation-top' || settings['row_divider'] == 'wave-animation-bottom') {
                    html =  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 150" fill="#fff"><path d="M 0 26.1978 C 275.76 83.8152 430.707 65.0509 716.279 25.6386 C 930.422 -3.86123 1210.32 -3.98357 1439 9.18045 C 2072.34 45.9691 2201.93 62.4429 2560 26.198 V 172.199 L 0 172.199 V 26.1978 Z"><animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z; M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z; M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z; M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate></path></svg>';
                    return html;
                }
                if(settings['row_divider'] == 'curved-top' || settings['row_divider'] == 'curved-bottom') {
                    html =  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 128" version="1.1" preserveAspectRatio="none" style="fill:#ffffff"><path stroke-width="0" d="M-1,126a3693.886,3693.886,0,0,1,1921,2.125V-192H-7Z"></path></svg>';
                    return html;
                }
            }
        } );
    } 

    var PXL_Icon_Contact_Form = function( $scope, $ ) {

        setTimeout(function () {
            $('.pxl--item').each(function () {
                var icon_input = $(this).find(".pxl--form-icon"),
                control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 10);

    };


    function vintech_split_text($scope){
        var st = $scope.find(".pxl-split-text");
        if(st.length == 0) return;
        gsap.registerPlugin(SplitText);

        st.each(function(index, el) {
         var els = $(el).find('p').length > 0 ? $(el).find('p')[0] : el;
         const pxl_split = new SplitText(els, { 
            type: "lines, words, chars",
            lineThreshold: 0.5,
            linesClass: "split-line"
        });
         var split_type_set = pxl_split.chars;

         gsap.set(els, { perspective: 400 });

         var settings = {
            scrollTrigger: {
                trigger: els,
                toggleActions: "play none none none",
                start: "top 86%",
                once: true
            },
            duration: 0.35, 
            stagger: 0.02,
            ease: "Expo.out"
        };
        if( $(el).hasClass('split-in-fade') ){
            settings.opacity = 0;
        }
        if( $(el).hasClass('split-in-right') ){
            settings.opacity = 0;
            settings.x = "50";
        }
        if( $(el).hasClass('split-in-left') ){
            settings.opacity = 0;
            settings.x = "-50";
        }
        if( $(el).hasClass('split-in-up') ){
            settings.opacity = 0;
            settings.y = "80";
        }
        if( $(el).hasClass('split-in-down') ){
            settings.opacity = 0;
            settings.y = "-80";
        }
        if( $(el).hasClass('split-in-rotate') ){
            settings.opacity = 0;
            settings.rotateX = "50deg";
        }
        if( $(el).hasClass('split-in-scale') ){
            settings.opacity = 0;
            settings.scale = "0.5";
        }

        if ($(el).hasClass('split-up')) {
            pxl_split.split({ type: "words" });
            split_type_set = pxl_split.words;

            $(split_type_set).each(function (index, elw) {
                gsap.from(elw, {
                    opacity: 0,
                    duration: 0.65,
                    y: 60,
                    delay: 0.25 + index * 0.065,
                    ease: "expo.out",
                    scrollTrigger: {
                        trigger: el,
                        start: "top 86%",
                        toggleActions: "play none none none",
                    },
                });
            });
        }

        if( $(el).hasClass('split-words-scale') ){
            pxl_split.split({type:"words"}); 
            split_type_set = pxl_split.words;

            $(split_type_set).each(function(index,elw) {
                gsap.set(elw, {
                    opacity: 0,
                    scale:index % 2 == 0  ? 0 : 2,
                    force3D:true,
                    duration: 0.1,
                    ease: "Linear.easeNone",
                    stagger: 0.02,
                },index * 0.01);
            });

            var pxl_anim = gsap.to(split_type_set, {
                scrollTrigger: {
                    trigger: el,
                    toggleActions: "play reverse play reverse",
                    start: "top 86%",
                },
                rotateX: "0",
                scale: 1,
                opacity: 1,
            });

        }else{
            var pxl_anim = gsap.from(split_type_set, settings);
        }

        if( $(el).hasClass('hover-split-text') ){
            $(el).mouseenter(function(e) {
                pxl_anim.restart();
            });
        }
    });
    }

    function vintech_scroll_trigger($scope){
        ScrollTrigger.matchMedia({
            "(min-width: 1401px)": function() {
                let t2 = gsap.timeline({
                    scrollTrigger: {
                        trigger: ".pxl-section-scale",
                        scrub: true,
                        start: "top top",
                        end: "bottom bottom",
                        pin: ".pxl-section-sticky",
                    },
                });
                t2.to(".pxl-section-slide", {
                    padding: "7.5rem"
                }, ">");
                t2.to(".pxl-sticky-mask", {
                    borderRadius: "2rem"
                }, "<");
                t2.from(".is-shape-1", {
                    right: "-10%"
                }, "<");
                t2.from(".is-shape-2", {
                    left: "-10%"
                }, "<");
            },
            "(max-width: 1400px)": function() {
                let t2 = gsap.timeline({
                    scrollTrigger: {
                        trigger: ".pxl-section-scale",
                        scrub: true,
                        start: "top top",
                        end: "bottom bottom",
                        pin: ".pxl-section-sticky",
                    },
                });
                t2.to(".pxl-section-slide", {
                    padding: "4.8rem"
                }, ">");
                t2.to(".pxl-sticky-mask", {
                    borderRadius: "1.6rem"
                }, "<");
                t2.from(".is-shape-1", {
                    right: "-10%"
                }, "<");
                t2.from(".is-shape-2", {
                    left: "-10%"
                }, "<");
            },
            "(max-width: 991px)": function() {
                let t2 = gsap.timeline({
                    scrollTrigger: {
                        trigger: ".pxl-section-scale",
                        scrub: true,
                        start: "top bottom",
                        end: "bottom top",
                    },
                });
                t2.to(".pxl-section-slide", {
                    padding: "2rem"
                }, ">");
                t2.to(".pxl-sticky-mask", {
                    borderRadius: "2rem"
                }, "<");
                t2.from(".is-shape-1", {
                    right: "-10%"
                }, "<");
                t2.from(".is-shape-2", {
                    left: "-10%"
                }, "<");

            },
        });
        gsap.to(".pxl-sticker-shape.is-rotate", {
            rotation: "800",
            scrollTrigger: {
                trigger: "#pxl-content-main",
                scrub: true,
                start: "top top",
                end: "bottom bottom",
            },
        });
    }

    function vintech_zoom_point(){
        elementorFrontend.waypoint($(document).find('.pxl-zoom-point'), function () {
            var offset = $(this).offset();
            var offset_top = offset.top;
            var scroll_top = $(window).scrollTop();
        }, {
            offset: -100,
            triggerOnce: true
        });
    }


    function vintech_logo_marquee($scope){
        const logos = $scope.find('.pxl-item--marquee');
        gsap.set(logos, { autoAlpha: 1 })

        logos.each(function(index, el) {
            gsap.set(el, { xPercent: 100 * index });
        }); 

        if (logos.length > 2) {
            const logosWrap = gsap.utils.wrap(-100, ((logos.length - 1) * 100));
            const durationNumber = logos.data('duration');
            const slipType = logos.data('slip-type');
            var slipResult = `-=${logos.length * 100}`;
            if(slipType == 'right') {
                slipResult = `+=${logos.length * 100}`;
            }
            gsap.to(logos, {
                xPercent: slipResult,
                duration: durationNumber,
                repeat: -1,
                ease: 'none',
                modifiers: {
                    xPercent: xPercent => logosWrap(parseFloat(xPercent))
                }
            });
        }             
    }

    function vintech_text_marquee($scope){

        const text_marquee = $scope.find('.pxl-text--marquee');

        const boxes = gsap.utils.toArray(text_marquee);

        const loop = text_horizontalLoop(boxes, {paused: false,repeat: -1,});

        function text_horizontalLoop(items, config) {
            items = gsap.utils.toArray(items);
            config = config || {};
            let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)}),
            length = items.length,
            startX = items[0].offsetLeft,
            times = [],
            widths = [],
            xPercents = [],
            curIndex = 0,
            pixelsPerSecond = (config.speed || 1) * 100,
            snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1),
            totalWidth, curX, distanceToStart, distanceToLoop, item, i;
            gsap.set(items, {
                xPercent: (i, el) => {
                    let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
                    xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
                    return xPercents[i];
                }
            });
            gsap.set(items, {x: 0});
            totalWidth = items[length-1].offsetLeft + xPercents[length-1] / 100 * widths[length-1] - startX + items[length-1].offsetWidth * gsap.getProperty(items[length-1], "scaleX") + (parseFloat(config.paddingRight) || 0);
            for (i = 0; i < length; i++) {
                item = items[i];
                curX = xPercents[i] / 100 * widths[i];
                distanceToStart = item.offsetLeft + curX - startX;
                distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
                tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
                .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
                .add("label" + i, distanceToStart / pixelsPerSecond);
                times[i] = distanceToStart / pixelsPerSecond;
            }
            function toIndex(index, vars) {
                vars = vars || {};
                (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length);
                let newIndex = gsap.utils.wrap(0, length, index),
                time = times[newIndex];
                if (time > tl.time() !== index > curIndex) { 
                    vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
                    time += tl.duration() * (index > curIndex ? 1 : -1);
                }
                curIndex = newIndex;
                vars.overwrite = true;
                return tl.tweenTo(time, vars);
            }
            tl.next = vars => toIndex(curIndex+1, vars);
            tl.previous = vars => toIndex(curIndex-1, vars);
            tl.current = () => curIndex;
            tl.toIndex = (index, vars) => toIndex(index, vars);
            tl.times = times;
            tl.progress(1, true).progress(0, true);
            if (config.reversed) {
                tl.vars.onReverseComplete();
                tl.reverse();
            }
            return tl;
        }
    }

    function vintech_scroll_fixed_section(){
        const fixed_section_top = $('.pxl-section-fix-top');
        if (fixed_section_top.length > 0) {
            ScrollTrigger.matchMedia({
                "(min-width: 991px)": function() {
                    const pinnedSections = ['.pxl-section-fix-top'];
                    pinnedSections.forEach(className => {
                        gsap.to(".pxl-section-fix-bottom", {
                            scrollTrigger: {
                                trigger: ".pxl-section-fix-bottom",
                                scrub: true,
                                pin: className,
                                pinSpacing: false,
                                start: 'top bottom',
                                end: "bottom top",
                            },
                        });
                        gsap.to(".pxl-section-fix-bottom .pxl-section-overlay-color", {
                            scrollTrigger: {
                                trigger: ".pxl-section-fix-bottom",
                                scrub: true,
                                pin: className,
                                pinSpacing: false,
                                start: 'top bottom',
                                end: "bottom top",
                            },
                        });
                    });
                }
            });
        }

        const section_overlay_color = $('.pxl-section-overlay-color');
        if (section_overlay_color.length > 0) {
            const space_top = section_overlay_color.data('space-top');
            const space_left = section_overlay_color.data('space-left');
            const space_right = section_overlay_color.data('space-right');
            const space_bottom = section_overlay_color.data('space-bottom');

            const radius_top = section_overlay_color.data('radius-top');
            const radius_left = section_overlay_color.data('radius-left');
            const radius_right = section_overlay_color.data('radius-right');
            const radius_bottom = section_overlay_color.data('radius-bottom');

            const overlay_radius = radius_top + 'px ' + radius_right + 'px ' + radius_bottom + 'px ' + radius_left + 'px ';

            ScrollTrigger.matchMedia({
                "(min-width: 991px)": function() {
                    const pinnedSections = ['.pxl-bg-color-scroll'];
                    pinnedSections.forEach(className => {
                        gsap.to(".overlay-type-scroll", {
                            scrollTrigger: {
                                trigger: ".pxl-bg-color-scroll",
                                scrub: true,
                                pinSpacing: false,
                                start: 'top bottom',
                                end: "bottom top",
                            },
                            left: space_left + "px",
                            right: space_right + "px",
                            top: space_top + "px",
                            bottom: space_bottom + "px",
                            borderRadius: overlay_radius,
                        });
                    });
                }
            });
        }
    }
    function vintech_scroll_checkp($scope){
        $scope.find('.pxl-el-divider').each(function () {
            var wcont1 = $(this);


            function checkScrollPosition() {
                var pxl_scroll_top = $(window).scrollTop(),
                viewportBottom = pxl_scroll_top + $(window).height(),
                elementTop = wcont1.offset().top,
                elementBottom = elementTop + wcont1.outerHeight();

                if (elementTop < viewportBottom && elementBottom > pxl_scroll_top) {
                    wcont1.addClass('visible');
                }
            }

            checkScrollPosition();

            $(window).on('scroll', function () {
                checkScrollPosition();
            });

        });
    }

    function vintech_section_start_render2(){

        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;

        _elementor.hooks.addFilter( 'pxl_element_container/before-render', function( html, settings, el ) {

            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){

                html += '<div class="pxl-section-bg-parallax"></div>';

            }

            return html;

        } );

    } 

    function pxl_widget_sphere_handler($scope) {
        const canvas = $scope.find(".pxl-sphere canvas");
        if (!canvas.length) return;

        const sphereEl = $scope.find(".pxl-sphere");
        const size = parseInt(sphereEl.data("size")) || 950;
        const radius = parseInt(sphereEl.data("radius")) || size * 0.5;
        const sphereColor = sphereEl.data("color") || "rgba(255, 255, 255, 0.15)";
        const rotationType = sphereEl.data("rotation") || "y_axis";
        const rotationSpeed = parseFloat(sphereEl.data("speed")) || 0.005;
        const customXSpeed = parseFloat(sphereEl.data("xspeed")) || 0.003;
        const customYSpeed = parseFloat(sphereEl.data("yspeed")) || 0.005;
        const tiltAngle =
        ((parseFloat(sphereEl.data("tilt")) || -30) * Math.PI) / 180;

        const ctx = canvas[0].getContext("2d");

        canvas[0].width = size;
        canvas[0].height = size;

        let angleX = tiltAngle;
        let angleY = 0;

        function rotate(point, angleX, angleY) {
            let cosX = Math.cos(angleX),
            sinX = Math.sin(angleX);
            let cosY = Math.cos(angleY),
            sinY = Math.sin(angleY);

            let y = point.y * cosX - point.z * sinX;
            let z = point.y * sinX + point.z * cosX;
            let x = point.x * cosY - z * sinY;
            z = point.x * sinY + z * cosY;
            return { x, y, z };
        }

        function drawSphere() {
            ctx.clearRect(0, 0, canvas[0].width, canvas[0].height);
            ctx.strokeStyle = sphereColor;
            ctx.lineWidth = 1;
            const cx = canvas[0].width / 2;
            const cy = canvas[0].height / 2;

            for (
                let lat = -Math.PI / 2;
                lat <= Math.PI / 2;
                lat += Math.PI / 10
                ) {
                let circlePoints = [];
            for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 20) {
                let x = Math.cos(lat) * Math.cos(lon);
                let y = Math.sin(lat);
                let z = Math.cos(lat) * Math.sin(lon);
                let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
                circlePoints.push(rotatedPoint);
            }
            ctx.beginPath();
            circlePoints.forEach((p, i) => {
                if (i === 0) {
                    ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
                } else {
                    ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
                }
            });
            ctx.closePath();
            ctx.stroke();
        }

        for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 10) {
            let circlePoints = [];
            for (
                let lat = -Math.PI / 2;
                lat <= Math.PI / 2;
                lat += Math.PI / 20
                ) {
                let x = Math.cos(lat) * Math.cos(lon);
            let y = Math.sin(lat);
            let z = Math.cos(lat) * Math.sin(lon);
            let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
            circlePoints.push(rotatedPoint);
        }
        ctx.beginPath();
        circlePoints.forEach((p, i) => {
            if (i === 0) {
                ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
            } else {
                ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
            }
        });
        ctx.stroke();
    }
}

function updateRotation() {
    switch (rotationType) {
    case "y_axis":
        angleY += rotationSpeed;
        break;
    case "x_axis":
        angleX += rotationSpeed;
        break;
    case "both_axis":
        angleX += rotationSpeed;
        angleY += rotationSpeed;
        break;
    case "custom":
        angleX += customXSpeed;
        angleY += customYSpeed;
        break;
    }
}

function animate() {
    updateRotation();
    drawSphere();
    requestAnimationFrame(animate);
}

animate();
};

function vintech_parallax_bg(){  
    $(document).find('.pxl-parallax-background').parallaxBackground({
        event: 'mouse_move',
        animation_type: 'shift',
        animate_duration: 2
    });
    $(document).find('.pxl-pll-basic').parallaxBackground();
    $(document).find('.pxl-pll-rotate').parallaxBackground({
        animation_type: 'rotate',
        zoom: 50,
        rotate_perspective: 500
    });
    $(document).find('.pxl-pll-mouse-move').parallaxBackground({
        event: 'mouse_move',
        animation_type: 'shift',
        animate_duration: 2
    });
    $(document).find('.pxl-pll-mouse-move-rotate').parallaxBackground({
        event: 'mouse_move',
        animation_type: 'rotate',
        animate_duration: 1,
        zoom: 70,
        rotate_perspective: 1000
    });

    $(document).find('.pxl-bg-prx-effect-pinned-zoom-clipped').each(function(index, el) {
        var $el = $(el);
        const clipped_bg_pinned = $el.find('.clipped-bg-pinned'); 
        const clipped_bg = $el.find('.clipped-bg');

        var clipped_bg_animation = gsap.to(clipped_bg, {
            clipPath: 'inset(0% 0% 0%)',
            scale: 1,
            duration: 1,
            ease: 'Linear.easeNone'
        });

        var clipped_bg_scene = ScrollTrigger.create({
            trigger: clipped_bg_pinned,
            start: function() {
                const start_pin = 350;
                return "top +=" + start_pin;
            },
            end: function() {
                const end_pin = 0;
                return "+=" + end_pin;
            },
            animation: clipped_bg_animation,
            scrub: 1,
            pin: true,
            pinSpacing: false,
        });

        function set_clipped_bg_wrapper_height() {
            gsap.set(clipped_bg, { height: window.innerHeight });                                
        }  
        window.addEventListener('resize', set_clipped_bg_wrapper_height);
    });



    $(document).find('.pxl-bg-prx-effect-pinned-circle-zoom-clipped').each(function(index, el) {
        const $el = $(el);

        var svg = $el.find('.circle-zoom-mask-svg'); 
        var img = $el.find('.clipped-bg-circle-pinned'); 
        let circle = $el.find('.circle-zoom'); 
        let radius = +circle[0].getAttribute("r");

        gsap.set(img[0], {
            scale: 2
        });

        var tl = gsap.timeline({
            scrollTrigger: {    
                trigger: el,
                start: "50% 90%",
                end: "80% 100%",
                scrub: 2,
            },
            defaults: {
                duration: 2
            }
        })
        .to(circle[0], {
            attr: {
                r: () => radius
            }
        }, 0)
        .to(img[0], {
            scale: 1,
        }, 0)
        .to(".circle-inner-layer", {
            alpha: 0,
            ease: "power1.in",
            duration: 1 - 0.25
        }, 0.25);


        window.addEventListener("load", vintech_circle_init);
        window.addEventListener("resize", vintech_circle_resize);
        function vintech_circle_init() {
            vintech_circle_resize();  
        }
        function vintech_circle_resize() {
            tl.progress(0);
            var rect = $(el)[0].getBoundingClientRect();
            const rectWidth = rect.width;
            const rectHeight = rect.height
            const dx = rectWidth / 2;
            const dy = rectHeight / 2;
            radius = Math.sqrt(dx * dx + dy * dy);

            tl.invalidate();
            ScrollTrigger.refresh();
        }
    });
}
$( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
        vintech_scroll_checkp($scope);
        vintech_animation_handler($scope);
    } );
    vintech_section_start_render();
    vintech_section_start_render2();
    vintech_parallax_bg(); 
    vintech_css_inline_js();
    vintech_section_before_render();
    vintech_zoom_point();
    vintech_scroll_fixed_section();
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_contact_form.default', PXL_Icon_Contact_Form );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) {
        vintech_split_text($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_sphere.default', function( $scope ) {
        pxl_widget_sphere_handler($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_post_slip.default', function( $scope ) {
        vintech_split_text($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_section_scale.default', function( $scope ) {
        vintech_scroll_trigger($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_logo_marquee.default', function( $scope ) {
        vintech_logo_marquee($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_text_marquee.default', function( $scope ) {
        vintech_text_marquee($scope);
    } );
} );
} )( jQuery );
