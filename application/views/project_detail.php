<style type="text/css">
    .start-video {
    position: absolute;
    top: 80px;
    padding: 12px;
    left: 174px;
    opacity: .3;
    
    cursor: pointer;
    
    transition: all 0.3s;
    }

    .start-video:hover
    {
        opacity: 1;
        -webkit-filter: brightness (1);
    }

    div.thumbnail_container
    {
        width: 244px;
        height: 244px;
        overflow: hidden;
        background-color: #000;
    }

    img.thumbnail
    {
        width: 400px;
        height: 244px;
        opacity: 0.5;
    }
</style>

<script type='text/javascript'>
    $(window).load(function(){
    //youtube script
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;

    onYouTubeIframeAPIReady = function () {
        player = new YT.Player('player', {
            height: '244',
            width: '434',
            videoId: '<?=$youtube_url?>',  // youtube video id
            playerVars: {
                'autoplay': 0,
                'rel': 0,
                'showinfo': 0
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    var p = document.getElementById ("player");
    $(p).hide();

    var t = document.getElementById ("thumbnail");
    t.src = "<?=$youtube_img?>";

    onPlayerStateChange = function (event) {
        if (event.data == YT.PlayerState.ENDED) {
            $('.start-video').fadeIn('normal');
        }
    }

    $(document).on('click', '.start-video', function () {
        $(this).hide();
        $("#player").show();
        $("#thumbnail_container").hide();
        player.playVideo();
    });
    });

</script>
        <section id="one">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2>Lorem ipsum</h2>
                        <p></p>
                    </div>
                </div>
                <label></label>
                <div class="row no-gutter">
                    <div class="col-lg-10 col-lg-offset-2">
                    <div class="col-lg-8">
                        <div id="player" class="col-lg-8"></div>
                        <div class="col-lg-8" id="thumbnail_container" class="thumbnail_container">
                            <img class="thumbnail" id="thumbnail" />
                        

                        <a class="start-video"><img width="64" src="http://localhost/images/video-play-icon.png" style="filter: invert(100%); -webkit-filter: invert(100%);"></a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="project-detail">
                                <div class="project-detail-head">
                                    <h3>1,053</h3>
                                    <p>backers</p>
                                    <h3>$100,000</h3>
                                    <p>pledged of $100,000 goal</p>
                                    <h3>19</h3>
                                    <p>day to go</p>
                                </div>

                                <div class="project-detail-footer">
                                    <label></label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-6">
                                            <div style="margin-top: 5px; margin-bottom: 5px;">
                                                <h2>50%</h2>
                                            </div> 
                                        </div>    
                                    </div>
                                    <div>
                                        <label></label>
                                        <button type="submit" data-toggle="modal" class="btn btn-primary btn-block btn-lg">Fandle Now <i class="glyphicon glyphicon-heart-empty"></i></button>
                                    </div>      
                                </div>                          
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="project-detail-inform">
                                <p>
                                    at fermentum. Aliquam consectetur, est ac auctor iaculis, odio mi bibendum leo, in congue neque velit vel enim. Nullam vitae justo at mauris sodales feugiat. Praesent pellentesque ipsum eget tellus imperdiet ultrices. Aliquam bibendum scelerisque elit, eu pharetra dui pulvinar eget. Nam mollis mauris id tellus ultricies at porttitor neque vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="social-icons">
                                <ul>
                                    <li class="twitter" style="background-color: #f0f0f0">
                                        <a href="#" target="_blank">Twitter</a>
                                    </li>

                                    <li class="facebook" style="background-color: #f0f0f0">
                                        <a href="#" target="_blank">Facebook</a>
                                    </li>
                                    
                                    <li class="googleplus" style="background-color: #f0f0f0">
                                        <a href="#" target="_blank">googleplus</a>
                                    </li>

                                    <li class="rss" style="background-color: #f0f0f0">
                                        <a href="#" target="_blank">rss</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>  
               
            </div>
        </section>
        <section class="bg-primary" id="one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                        <ul class="nav nav-tabs">
                          <li role="presentation" class="active"><a href="#">Home</a></li>
                          <li role="presentation"><a href="#">Profile</a></li>
                          <li role="presentation"><a href="#">Messages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>