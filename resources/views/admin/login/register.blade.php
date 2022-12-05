<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Register</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/template/vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/template/vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/template/vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/template/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/template/vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="/template/src/plugins/jquery-steps/jquery.steps.css"
		/>
		<link rel="stylesheet" type="text/css" href="/template/vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>

	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="{{ route('admin.login.index') }}">
						<img src="/template/vendors/images/deskapp-logo.svg" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						<li><a href="{{ route('admin.login.index') }}">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="/template/vendors/images/register-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="register-box bg-white box-shadow border-radius-10">
							<div class="wizard-content">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (count($errors))
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                            {{ $err }}
                                        @endforeach
                                    </div>
                                @endif
								<form action="{{ route('admin.register') }}" class="tab-wizard2 wizard-circle wizard" method="POST">
                                    @csrf
                                    
									<section>
										<div class="form-wrap max-width-600 mx-auto">
                                            <div class="form-group row">
												<label class="col-sm-4 col-form-label">Tên*</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="name" placeholder="Tên"/>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Email*</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="email" placeholder="Email"/>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Mật khẩu*</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" placeholder="******"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label"
													>Xác nhận mật khẩu*</label
												>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirm" placeholder="******"/>
												</div>
											</div>
										</div>
                                        <div class="input-group mb-0">
											<button type="submit" class="btn btn-primary btn-lg btn-block">Đăng ký</button>
										</div>
									</section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


		
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="/template/vendors/scripts/core.js"></script>
		<script src="/template/vendors/scripts/script.min.js"></script>
		<script src="/template/vendors/scripts/process.js"></script>
		<script src="/template/vendors/scripts/layout-settings.js"></script>
		<script src="/template/src/plugins/jquery-steps/jquery.steps.js"></script>
		<script src="/template/vendors/scripts/steps-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
