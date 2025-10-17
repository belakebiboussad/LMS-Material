<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://code.getmdl.io/1.1.0/material.blue-light_blue.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		form { max-width: 300px; margin: 0 auto; }
		.mdl-grid { margin-top: 15%; }
	</style>
</head>
<body class="mdl-color--grey-200">
	<div class="mdl-layout mdl-js-layout">
		<main class="mdl-layout__content">
			<div class="mdl-grid mdl-grid--no-spacing">
				<div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset-desktop mdl-cell--2-offset-tablet">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" type="text" id="username" autocomplete="off" autofocus>
							<label class="mdl-textfield__label" for="username">Username</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" type="password" id="password" autocomplete="off">
							<label class="mdl-textfield__label" for="password">Password</label>
						</div>
					    <!-- <a class="waves-effect waves-light btn right hoverable"><i class="large material-icons right">lock_open</i>Login</a> -->
						    <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</main>
	</div>
	<script src="https://storage.googleapis.com/code.getmdl.io/1.1.0/material.min.js"></script>
</body>
</html>
