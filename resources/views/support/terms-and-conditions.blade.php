@extends('layouts.app')
@section('pageTitle','Terms And Conditions')
@section('css')
    <link href="{{asset('css/support.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="heading text-center py-4">
        <h1><i>TERMS AND CONDITIONS</i></h1>
    </div>
    <div class="container">
        <div class="mt-4">
            <h5 class="sect-title">TERMS OF USE</h5>
            <p>
                Kindly read all of the following terms and conditions of use for this website 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> 
                ("TOU") before using this site.
            </p>
            <p>
                By visiting our site and continuing to access this site or use any service on this site 
                you are signifying your acceptance to the terms and conditions. We reserve the right to 
                amend, remove or add to these terms and conditions at any time. Kindly re-visit the terms 
                of use whenever you access this site or use any service on this site in order to stay 
                updated with any changes to the term of use.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">USER CONSENT TO THE TERMS OF USE:</h5>
            <p>
                You confirm that you have read, understood and agree to be bound by the terms of use.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">INTELLECTUAL PROPERTY AND LICENSE:</h5>
            <p>
                This website as well as the design, concept and information contained therein including 
                but not limited to the text, content, graphics, photographs, analysis and ratings 
                contained on this site are the exclusive property of InvestTradeProfitNow ("ITPN") and 
                is protected by copyrights and trademarks. You are hereby granted only a limited, 
                non-exclusive, non-assignable and non-transferable license to access 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> provided that all access and use 
                shall be governed by all of the terms and conditions set forth in this USER AGREEMENT. 
                You agree to abide by all applicable copyright and intellectual property protection laws 
                as well as any additional copyright notices or restrictions contained in the service. 
                You acknowledge that the website and its service has been developed, compiled, prepared, 
                revised, selected, and arranged by ITPN and its general and limited partners and 
                affiliates and others (including certain other information sources) through the 
                application of methods and standards of judgment developed and applied through the 
                expenditure of substantial time, effort, and money and as such it constitutes valuable 
                intellectual property of ITPN. You agree to protect the proprietary rights of ITPN and all 
                others having rights in the service during and after the term of this agreement and to 
                comply with all reasonable written requests made by ITPN or its suppliers and licensors of 
                content, equipment, or otherwise ("suppliers") to protect their contractual and statutory 
                rights in the service. You agree to notify us in writing promptly upon becoming aware of 
                any unauthorized access or use of the service by any person or entity or of any claim that 
                the service infringes upon any copyright, trademark, or other contractual rights. Except 
                as specifically permitted by the TOU, you shall not copy or make any use of the service or 
                any portion thereof. Except as specifically permitted herein, you shall not use the 
                Intellectual Property Rights or the service, or the names of any individual participant 
                in, or contributor to, the service, or any variations or derivatives thereof, for any 
                purpose whatsoever, without ITPN's prior written approval.
            </p>
            <p>
                You do not acquire any rights or licenses in or to the websites and its service as well as 
                the materials contained within the service other than the limited right to utilize the 
                service in accordance with the TOU. In the event you choose to download content from the 
                service, you must do so in accordance with the TOU and such downloads are licensed to you 
                by ITPN solely for your own personal, non-commercial use in accordance with the TOU and 
                does not transfer any other rights to you.
            </p>
            <p>
                In the event you submit any material to this website or to ITPN or its representatives, 
                unless indicated otherwise, you will have automatically granted to ITPN a perpetual, 
                nonexclusive, irrevocable, fully paid, royalty-free, sub-licensable and transferable (in 
                whole or in part) worldwide right and license in any and all media, known currently or 
                later developed, to use, publish, reproduce, display, modify, transmit digitally, create 
                derivative works, distribute, copy, and otherwise exploit , such content for any purpose 
                whatsoever at the discretion of ITPN (including, without limitation, advertising, 
                commercial, promotional and publicity purposes), without additional notice, attribution or 
                consideration to you or to any other person or entity. You will also have permitted any 
                other user to access, store, or reproduce such material for that user's personal use. You 
                will also have granted ITPN the right to use the name that you submit in connection with 
                such content.
            </p>
            <p>
                You represent and warrant that you legally own or control all the rights to the material 
                that you submit; that the material you submit is truthful and accurate; that use of the 
                material you supply does not violate this TOU and will not cause injury to any person or 
                entity; and that you will indemnify ITPN and its suppliers, agents, directors, officers, 
                employees, representatives, successors, and assigns for all claims resulting out of the 
                material that you supply. ITPN and its suppliers, agents, directors, officers, employees, 
                representatives, successors, and assigns disclaim any responsibility and assume no 
                liability for any material submitted by you or any third party.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">REGISTRATION:</h5>
            <p>
                On registering, you confirm that all information you provide, now or in the future, is 
                accurate.
            </p>
            <p>
                If you do not login at <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> for a 
                continuous period of 45 days your registration may get automatically cancelled.
            </p>
            <p>
                We reserve the right, at our sole discretion, to deny you access to this website or any 
                portion thereof without notice for the following reasons:
                <ol type="a">
                    <li>
                        Unauthorized access or use by you;
                    </li>
                    <li>
                        If you assign or transfer or attempt to assign or transfer any rights granted to 
                        you under this Agreement;
                    </li>
                    <li>
                        Violation of other terms and conditions of this User Agreement;
                    </li>
                </ol>
            </p>
            <p>
                You agree to get periodic SMS alerts and newsletters.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">RESTRICTIONS ON USE:</h5>
            <p>
                You shall not use the service for any illegal purposes or for the violation of any law or 
                regulation, or in any manner inconsistent with the TOU. You agree to use the service solely 
                for your own non-commercial use and benefit, and not for resale or other transfer or 
                disposition to, or use by or for the benefit of, any other person or entity. You agree not 
                to use, transfer, distribute, or dispose of any information contained in the service in 
                any manner that could compete with the business of ITPN.
            </p>
            <p>
                You shall not copy, reproduce, recompile, decompile, assemble, disassemble, distribute, 
                publish, display, modify or upload to, create derivative works from, transmit, or in any 
                way exploit any part of the service, except for downloading material from the service for 
                your own personal, non-commercial use.
            </p>
            <p>
                You shall not recirculate, redistribute or publish the analysis and presentation included 
                in the service without ITPN's prior written consent. You may use the "e-mail this article" 
                function solely to inform others about a 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> news article, and you shall 
                immediately cease using this function with regard to recipients who have requested not to 
                receive such information.
            </p>
            <p>
                You shall not offer the service or any part thereof for sale or distribution over any other medium 
                without the prior written consent of ITPN. The service and the information contained 
                therein shall not be used to construct a database of any kind nor shall the service be 
                stored (in its entirety or in any part) in databases for access by you or any third party 
                or to distribute any database services containing all or part of the service.
            </p>
            <p>
                You shall not input, distribute, upload, post, email, transmit or otherwise make available 
                any content through the service that:
                <ul>
                    <li>
                        is promotional in nature, including solicitations for funds or business, without 
                        the prior written authorization of ITPN constitutes junk mail, spam, chain letters 
                        or pyramid schemes;
                    </li>
                    <li>
                        is unlawful, harmful, threatening, abusive, defamatory, vulgar, obscene, libelous, 
                        invasive of privacy, hateful, or racially, ethnically or otherwise objectionable;
                    </li>
                    <li>
                        you do not have the right to make available under any law or under contractual or 
                        fiduciary relationships (such as inside information, proprietary and confidential 
                        information learned or disclosed as part of employment relationships or under 
                        nondisclosure agreements);
                    </li>
                    <li>
                        infringes any patent, trademark, trade secret, copyright or other proprietary 
                        rights of any third party;
                    </li>
                    <li>
                        contains software viruses or any other computer codes, files or programs designed 
                        to interrupt, destroy or limit the functionality of any computer software/hardware, 
                        or telecommunication equipment.
                    </li>
                    <li>
                        You shall not use any of the trademarks, trade names, copyrights, or logos of 
                        <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> in any manner which 
                        creates the impression that any such items belong to or are associated with you or 
                        are used with ITPN's consent.
                    </li>
                </ul>
            </p>
            <p>
                The services have been created by 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> exclusively for ITPN Subscribers. You may not copy, reproduce, distribute, publish, display, perform, modify, create derivative works, transmit, or in any way exploit any such content. Unauthorized usage is an infringement of our intellectual property rights and a violation of law, and it may also result in cancellation of your subscription without any refund and may lead to legal action.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">DELAY IN SERVICES:</h5>
            <p>
                Neither <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> (including its directors, 
                employees, affiliates, agents, representatives or subcontractors) shall be liable for any 
                loss or liability resulting, directly or indirectly, from delays or interruptions due to 
                electronic or mechanical equipment failures, telecommunication interconnect problems, 
                defects, weather, strikes, walkouts, fire, act of God, riots, armed conflicts, acts of 
                war, or other like causes during which 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> shall have no responsibility to 
                provide you access to the website and its services.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">FEES AND PAYMENTS:</h5>
            <p>
                ITPN reserves the right at any time to charge fees for access to the entire service or 
                portions of the service. If at any time ITPN decides to charge such a fee you will be 
                required to register and create an account and you shall pay all fees incurred through 
                your account at the rates in effect for the billing period in which such fees are incurred, 
                including but not limited to charges for any products or services offered for sale through 
                the service by ITPN or any other vendor or service provider. You shall be solely 
                responsible to payment of all such fees billed to you along with all applicable taxes 
                relating to the use of the service through your account, and the purchase of any other 
                products or services. ITPN reserves the right to charge a prepaid fee, which may be 
                modified from time to time at ITPN's sole discretion. Such prepaid fees and all taxes 
                thereon will have to be paid by you in advance, failing which you shall not receive the 
                service or any portions thereof.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">DISCLAIMER AND LIMITATION OF LIABILITY:</h5>
            <p>
                You agree that your use of the website and the service including dissemination of 
                information through SMS, newsletters or any other communication mode is at your sole risk 
                and that the content, information, software, products, features, advertisements, analysis 
                and services on this website are provided on AS IS and AS AVAILABLE basis and ITPN makes 
                no warranty of any kind whatsoever that the website and services and content thereon do 
                not include any inaccuracies or errors or that the content is suitable and fit for any 
                particular purpose or that there is proper title and non-infringement and merchantability.
            </p>
            <p>
                In no event shall ITPN or its suppliers, agents, directors, officers, employees, 
                representatives, general partners, successors, and assigns, or otherwise be held liable 
                for any direct, indirect, punitive, incidental, special or consequential damages or loss 
                of profit or losses by any party due to delays or inability to use the website or 
                otherwise arising out of the website or service or part thereof, even if ITPN has been 
                advised specifically of the possibility of such damages. Even if the applicable law may 
                not allow limitation or exclusion of liability or incidental or consequential damages, in 
                no event shall ITPN's total liability to you for all damages, losses and causes of action 
                (whether in contract or tort, including but not limited to negligence) exceed the amount 
                paid by you, if any, for accessing this website or service or part thereof.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">USE OF MESSAGE BOARDS, CHAT ROOMS AND ANY OTHER COMMUNICATION FORUMS:</h5>
            <p>
                This Web site contains message and bulletin boards, chat rooms, and other message or 
                communication facilities (collectively, "Forums").
            </p>
            <p>
                You hereby agree to use the Forums only to send and receive messages and material that are 
                proper and related to the particular Forum and that when using a Forum, you shall not do 
                any of the following:
                <ul>
                    <li>
                        defame, abuse, harass, stalk, threaten or otherwise violate the legal rights 
                        (such as rights of privacy and publicity) of others;
                    </li>
                    <li>
                        publish, post, distribute or disseminate any defamatory, infringing, obscene, 
                        indecent or unlawful material or information;
                    </li>
                    <li>
                        upload files that contain software or other material protected by intellectual 
                        property laws (or by rights of privacy of publicity) unless you own or control the 
                        rights thereto or have received all necessary consents;
                    </li>
                    <li>
                        upload files that contain viruses, corrupted files, or any other similar software 
                        or programs that may damage the operation of another's computer conduct or forward 
                        surveys, contests, or chain letters;
                    </li>
                    <li>
                        download any file posted by another user of a Forum that you know, or reasonably 
                        should know, cannot be legally distributed in such manner;
                    </li>
                </ul>
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">COMPUTER AND TELECOMMUNICATION EQUIPMENT AND CONNECTIONS</h5>
            <p>
                You are responsible for operating your own computer and telecommunication equipment and 
                internet connections used to access <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a>
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">AUTHORITY TO AGREE TO THIS TOU</h5>
            <p>
                You represent, warrant and covenant that you have the power and authority to enter into 
                this agreement; and that you are at least eighteen (18) years old.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">LINKS TO THIRD PARTY SITES</h5>
            <p>
                The links in this site may allow you to leave 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> and take to you to external 
                sites. The linked sites are not under the control of ITPN. ITPN does not review or approve 
                these sites and is not responsible for the contents or omissions of any linked site or any 
                further links contained in a linked site. The mere fact that a site is linked from 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> does not imply endorsement of 
                such a site by <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> or by ITPN. Third 
                party links to <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> are governed by a 
                separate agreement.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">INDEMNIFICATION</h5>
            <p>
                You agree, at your own expense, to indemnify, defend and hold harmless ITPN, its suppliers, 
                agents, directors, officers, employees, representatives, successors, and assigns from and 
                against any and all claims, damages, liabilities, costs, and expenses, including 
                reasonable lawyers' and experts' fees, arising out of or in connection with the service, 
                or any links on the service, including, but not limited to:
                <ol>
                    <li>
                        your use or someone using your computer's for accessing the service;
                    </li>
                    <li>
                        use of the service by someone using your account;
                    </li>
                    <li>
                        a violation of the TOU by you or anyone using your computer to access the service 
                        or by anyone using your account;
                    </li>
                    <li>
                        a claim that any use of the service by you or someone using your computer to 
                        access the service or by anyone using your account infringes any intellectual 
                        property right of any third party, or any right of privacy or publicity, is 
                        libelous or defamatory, or otherwise results in injury or damage to any third 
                        party;
                    </li>
                    <li>
                        any deletions, additions, insertions or alterations to, or any unauthorized use of, 
                        the service by you or someone using your computer to access the service or by 
                        anyone using your account;
                    </li>
                    <li>
                        any misrepresentation or breach of representation or warranty made by you;
                    </li>
                    <li>
                        any breach of any covenant or agreement to be performed by you hereunder;
                    </li>
                </ol>
            </p>
            <p>
                You agree to pay any and all costs, damages, and expenses, including, but not limited to, 
                reasonable lawyers' fees and costs awarded against or otherwise incurred by or in connection with 
                or arising from any such claim, suit, action, or proceeding attributable to any such claim. 
                ITPN reserves the right, at its own expense, to assume the exclusive defense and control 
                of any matter otherwise subject to indemnification by you, in which event you will fully 
                cooperate with ITPN in asserting any available defense. You acknowledge and agree to pay 
                reasonable lawyers' fees incurred by ITPN in connection with any and all lawsuits brought 
                against you by ITPN under the TOU and any other terms and conditions of service on this 
                site, including without limitation, lawsuits arising from your failure to indemnify ITPN 
                pursuant to the TOU.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">TERMINATION:</h5>
            <p>
                You may terminate the TOU, with or without cause and at any time, by discontinuing your 
                use of the service and destroying all materials obtained from the service.
            </p>
            <p>
                You agree that, without notice, ITPN may terminate the TOU, or suspend your access to the service, 
                with or without cause at any time and effective immediately. The TOU will terminate 
                immediately without notice from ITPN to you if in ITPN's sole discretion you fail to 
                comply with any provision of the TOU.
            </p>
            <p>
                ITPN shall not be liable to you or any third party for the termination or suspension of the 
                service, or any claims related to the termination or suspension of the service. Upon termination 
                of the TOU by you or ITPN, you must discontinue your use of the service and destroy promptly all 
                materials obtained from the service and any copies thereof. In the event that the termination is 
                made by ITPN without cause for a paid service, you will be entitled to a proportionate refund of 
                the fees paid by you the service for the balance period from the date of such termination.
            </p>
            <p>
                In the event any user is dissatisfied with the service, ITPN shall endeavour to resolve the issues 
                to the subscriber's satisfaction, failing which ITPN reserves the right to unilaterally 
                cancel the subscription by simultaneously refunding in full the subscription amount 
                received.
            </p>
        </div>
        <div class="mt-4">
            <h5 class="sect-title">ENTIRE AGREEMENT:</h5>
            <p>
                This TOU Agreement constitutes the entire agreement between the parties, and no other 
                agreement, written or oral, exists between you and 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> By using the 
                Information on <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a>
                you assume full responsibility for any and all gains and losses, financial, emotional or 
                otherwise, experienced, suffered or incurred by you. ITPN and 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> 
                do not guarantee the accuracy, completeness or timeliness of, or otherwise endorse in 
                any way, the views, opinions or recommendations expressed in the Information, do not 
                give investment advice, and do not advocate the purchase or sale of any security or 
                investment by you or any other individual. The information is not intended to provide 
                tax, legal or investment advice, which you should obtain from your professional advisor 
                prior to making any investment of the type discussed in the Information. The Information 
                does not constitute a solicitation by the information providers, 
                <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> or any other person for the 
                purchase or sale of securities.
            </p>
        </div>
        <div class="mb-4">
            <h5 class="sect-title">JURISDICTION:</h5>
            <p>
                The terms of this agreement are exclusively based on and subject to Indian law. You hereby consent 
                to the exclusive jurisdiction and venue of courts in Mumbai, India in all disputes arising 
                out of or relating to the use of this website. The use of this website is unauthorized in 
                any jurisdiction that does not give effect to all provisions of these terms and conditions, 
                including and without limitation to this paragraph.
            </p>
        </div>
    </div>
@stop