<?php global $yith_wcas ?>
<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway";
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section.section-cta.section-odd {
        background-color: #f1f1f1;
    }
    .section:nth-child(even){
        background-color: #fff;
    }
    .section:nth-child(odd){
        background-color: #ffffff;
    }
    .section .section-title img{
        display: inline-block;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section .section-title h2,
    .section .section-title h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 24px;
    }
    .landing-container{
        max-width: 1170px;
        margin-left: auto;
        margin-right: auto;
        padding: 28px 0 42px;
    }
    .landing-container.last{
        padding-top: 54px;
    }
    .landing-container.upgrade{
        max-width: 748px
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container h2{
        font-size: 25px;
        line-height: 25px;
        color: #808a97;
        font-weight: 700;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 65px;
    }
    .landing-container li{
        display: table;
    }
    .landing-container li img{
        display: table-cell;
        vertical-align: middle;
    }
    .landing-container li span{
        font-size: 17px;
        line-height: 25px;
        font-family: 'raleway';
        color: #7d7d7d;
        display: table-cell;
        vertical-align: middle;
    }
    .landing-container h2:before{
        content: '';
        background-color: #d9dce0;
        height: 1px;
        width: 100%;
        display: block;
        margin-bottom: 65px;
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 66%;
    }
    .landing-container .col-2{
        width: 34%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 16px;
        font-weight: 500;
        display: inline-block;
        width: 61%;
    }
    .premium-cta a.button{
        margin-top: 12px;
        border: 0px solid #fff;
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YITH_WCAS_ASSETS_IMAGES_URL?>upgrade.png) #ff643f no-repeat 13px 13px;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YITH_WCAS_ASSETS_IMAGES_URL?>upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    @media (min-width: 1200px){
        .landing-container .col-1 img{
            width: auto;
        }
    }

    @media (max-width: 767px){
        .landing-container .col-1{
            width: 100%;
        }
        .landing-container .col-2{
            width: 100%;
            padding: 0 30px;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta p{
            width: 100%;
            text-align: center;
            font-size: 13px;
        }
        .premium-cta a.button{
            float: none;
        }
        .landing-container.upgrade{
            max-width: 466px;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
        .landing-container.upgrade{
            max-width: 100%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container upgrade">
            <div class="premium-cta">
                <p>
                    Upgrade to the <span class="highlight">premium version</span><br/>
                    of <span class="highlight">YITH WooCommerce Ajax Search</span> to benefit from all features!
                </p>
                <a href="<?php echo $yith_wcas->obj->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight">UPGRADE</span>
                    <span>to the premium version</span>
                </a>
            </div>
        </div>
    </div>
    <div class="section section-even clear">
        <h1>Premium Features</h1>
        <div class="landing-container">
            <h2>HOW TO CUSTOMIZE THE RESULTS OF THE AUTOCOMPLETE</h2>
            <div class="col-1">
                <img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>01.jpg" alt="01" style="margin-top: -18px" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <ul>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-one.png" alt="1"/><span>Show <b>the image</b> of the product (left or right aligned))</span></li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-two.png" alt="2"/><span>Enable the <b>price visualization</b></span></li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-three.png" alt="3"/><span>Show the <b>product description</b></span></li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-fourth.png" alt="3"/><span>Tell to the client if the product is on discount or is featured </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section clear">
        <div class="landing-container">
            <h2>HOW TO CUSTOMIZE THE SEARCH OPTIONS</h2>
            <div class="col-2">
                <div class="section-title">
                    <ul>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-five.png" alt="5"/><span>Extend the research in the excerpt and in the content</li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-six.png" alt="6"/><span>Activate the category search</span></li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-seven.png" alt="7"/><span>Configure the <b>tag</b> search</span></li>
                        <li><img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>number-eight.png" alt="8"/><span>Search a product with an <b>ID</b></span></li>

                    </ul>
                </div>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCAS_ASSETS_IMAGES_URL ?>02.png" alt="02" />
            </div>
        </div>
    </div>
    <div class="section section-cta section-odd">
        <div class="landing-container upgrade last">
            <div class="premium-cta">
                <p>
                    Upgrade to the <span class="highlight">premium version</span><br/>
                    of <span class="highlight">YITH WooCommerce Ajax Search</span> to benefit from all features!
                </p>
                <a href="<?php echo $yith_wcas->obj->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight">UPGRADE</span>
                    <span>to the premium version</span>
                </a>
            </div>
        </div>
    </div>
</div>