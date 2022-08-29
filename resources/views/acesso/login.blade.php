@extends('template.acesso')

@section('css')
@endsection

@section('corpo')
    <div class="d-flex flex-center w-lg-50 p-10">
        <!--begin::Card-->
        <div class="card rounded-3 w-md-550px">
            <!--begin::Card body-->
            <div class="card-body p-10 p-lg-20">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('login')}}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Acesse o painel</h1>
                        <!--end::Title-->
                        
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Separator-->
                    <div class="separator separator-content my-14">
                        <span class="w-150px text-gray-500 fw-semibold fs-7">Usuário / e-mail</span>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="E-mail/Usuário" name="email" autocomplete="off" class="form-control bg-transparent" />
                        <!--end::Email-->
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3">
                        <!--begin::Password-->
                        <input type="password" placeholder="Senha" name="password" autocomplete="off" class="form-control bg-transparent" />
                        <!--end::Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
                        <a href="/EsqueceuSenha" class="link-primary">Esqueceu a senha?</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Entrar</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Verificando...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->

                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('js')
@endsection

@section('script')
@endsection
