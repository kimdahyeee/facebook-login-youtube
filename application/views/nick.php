	    <!--이부분 닉네임 부분-->
	    <section>
	    <div class="container-fluid">
            <div class="row">
            	<div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="margin-top-0 wow fadeIn"><?=$name?>님</h2>
                	<h2 class="margin-top-0 wow fadeIn">닉네임을 입력해주세요</h2>
                	<hr class="primary">
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <form class="contact-form row" method="post" action="/index.php/auth/login">
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <input type="text" id="nickName" name="nickName" class="form-control" placeholder="nickName">
                        <input type="hidden" id="name" name="name" value="<?=$name?>">
                        <input type="hidden" id="email" name="email" value="<?=$email?>">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="submit" data-toggle="modal" class="btn btn-primary btn-block btn-lg">가입 <i class="ion-checkmark-round"></i></button>
                    </div>
                </form>
            </div>
        </div>
		</section>

