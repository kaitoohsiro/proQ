@include('user.components.head')
@include('user.components.header')
@include('user.components.footer')


@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif


<div class="body-wrap">
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">Math Challenge</h1>
                        <p class="hero-paragraph">
                            数学の脳トレです。暗算でも、紙で計算してもプログラム書いてもなんでもよし。サンプルコード用意しています。
                            <br>
                            Number rules the universe (pythagoras)
                        </p>
                        <div class="hero-cta"><a class="button button-primary" href="/select">スタート</a><a class="button" href="/rank">ランキング</a></div>
                    </div>
                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;" />
                        </svg>
                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                        <div class="hero-figure-box hero-figure-box-05"></div>
                        <div class="hero-figure-box hero-figure-box-06"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="features section">
            <div class="container">
                <div class="pro-co">
                    <p>対応言語</p>
                </div>
                <div class="features-inner section-inner has-bottom-divider">
                    <div class="features-wrap">
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-js-square h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">JavaScript</h4>
                                <p class="text-sm mb-0">動的にコンテンツを更新したり、マルチメディアを管理したり、その他多くのことができるスクリプト言語。</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-php h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">PHP</h4>
                                <p class="text-sm mb-0">PHP: Hypertext Preprocessor を再帰的に略したもので、広く使われているオープンソースの汎用スクリプト言語</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-python h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">Python</h4>
                                <p class="text-sm mb-0">文法を極力単純化してコードの可読性を高め、読みやすく、書きやすい汎用の高水準言語。ライブラリーが豊富</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-cuttlefish h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">C言語</h4>
                                <p class="text-sm mb-0">汎用性、実行速度に優れ、またOS、機械との互換性がいいコンパイル言語</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-java h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">Java</h4>
                                <p class="text-sm mb-0">システム開発、web開発、アプリケーション開発と多様な場面で使える器用な言語</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-medium-m h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">MATLAB</h4>
                                <p class="text-sm mb-0">数値解析ソフトウェアで、その中で使う言語のこと。C,C++,Java,Pythonとのインターフェイスの機能を有す.</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="far fa-gem h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">Ruby</h4>
                                <p class="text-sm mb-0">まつもとひろゆき氏によって生み出されたオブジェクト指向スクリプト言語。</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fas fa-plus h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">C++</h4>
                                <p class="text-sm mb-0">C言語の機能をさらに拡張させたプログラミング言語。webアプリケーション、人工知能、ロボットなどの開発に使われる</p>
                            </div>
                        </div>
                        <div class="feature text-center is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="fab fa-unity h1"></i>
                                </div>
                                <h4 class="feature-title mt-24">C#</h4>
                                <p class="text-sm mb-0">マイクロソフトが開発した言語。いろいろ使えるがunityのイメージである。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
</head>

<body>
    @yield('header')
    @yield('content')
    @yield('footer')
</body>

</html>