    <section>
        <div class="container-fluid">
            <div class="row">
            	<div class="col-lg-8 col-lg-offset-2 text-center">
                	<h2 class="margin-top-0 wow fadeIn">Log In</h2>
                	<hr class="primary">
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <form class="contact-form row" method="post" action="/index.php/auth/authentication">
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="submit" data-toggle="modal" class="btn btn-primary btn-block btn-lg">Enter <i class="ion-checkmark-round"></i></button>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label> <a class ="btn btn-block btn-social btn-facebook btn-lg" href="javascript:applogin();"> <i class="fa fa-facebook" ></i> facebook login</a>
                    </div>
                </form>
            </div>
        </div>
	</section>
    <script>
    function applogin(){
        var w_left = (screen.width/4);
        var w_top = (screen.height/4);

        window.open('<?php echo $address; ?>', 'targetWindow','toolbar=no,titlebar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=900,height=500,top='+w_top+',left='+w_left+'');

    }
    </script>