@extends('layouts.app')
@section('pageTitle','Disclaimer')
@section('css')
    <link href="{{asset('css/support.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="heading text-center py-4">
        <h1><i>DISCLAIMER</i></h1>
    </div>
    <div class="container mt-4">
        <p>
            You hereby agree that by accessing www.investtradeprofitnow.com ("the website") you have 
            read, understood and agreed to be legally bound by the following disclaimers:
            <ul>
                <li>
                    You agree that your access to, and use of, the services and the content and tools 
                    available through the services is on an “as-is available” basis and we specifically 
                    disclaim any representations or warranties, express or implied, including, without 
                    limitation, any representations or warranties of merchantability or fitness for a 
                    particular purpose. Our rating methodology is based on parameters of quality, 
                    valuation, current financial trends and technical analysis is solely for the purpose 
                    of investor education and awareness. You should always seek the assistance of a 
                    professional for investment advice.
                </li>
                <li>
                    We have taken and continue to take utmost care and caution in compilation of historical data and 
                    updating current data on our web site. We also take due care in analysis of the data. The 
                    information and data provided on the website have been obtained and culled out of whatever is 
                    available on public domain and we do not in any way guarantee the accuracy, adequacy or 
                    completeness of any information and data and we cannot be held responsible for any errors or 
                    omissions in such information, data and/or analysis of such information and data nor for the 
                    results obtained by any user of the website from the use of such information, data, analysis and 
                    ratings provided on the website.
                </li>
                <li>
                    The views and investment tips expressed by brokers and investment experts on our website are 
                    their own, and not that of the website or its management. We strongly advise all our users to 
                    check with certified experts before taking any investment decision. We emphasize that all 
                    investors should use the information on the site merely as a resource to enhance their own 
                    research and understanding on all featured companies, stocks, mutual funds, other asset classes, 
                    sectors, markets and information presented on the website and nothing published on this website 
                    should be considered as investment advice including the suggested buy/sell.
                </li>
                <li>
                    Investment in securities is subject to market risks. Past performance should not be 
                    construed as a guarantee for future returns. Investments in equity and equity related 
                    securities involve a high degree of risks and the users should not place funds to 
                    invest unless they can afford to take the risk on their investment.
                </li>
                <li>
                    Invest Trade Profit Now ("the Company"), who are the owners of 
                    <a target="_blank" href="{{route('home')}}">{{config('app.url')}}</a> especially 
                    state that neither the Company nor its shareholders, directors, officers, employees, 
                    advertisers, content providers and licensors have any liability, financial or 
                    otherwise, (jointly or severally) whatsoever to any user of the website or any other 
                    person as a result of your access or use of the services for indirect, consequential, 
                    special, incidental, punitive, or exemplary damages, including, without limitation, 
                    lost profits, lost savings and lost revenues (collectively, the “excluded damages”), 
                    whether or not characterized in negligence, tort, contract, or other theory of 
                    liability.
                </li>
                <li>
                    Our website contains material in the form of inputs submitted by users for which we 
                    do not accept any responsibility as the regards the content or accuracy of such 
                    content. Certain portions of our website contain advertising and other material 
                    submitted to us by third parties. Kindly note that it is those advertisers or third 
                    parties that are responsible for ensuring that material submitted for inclusion on 
                    the website duly complies with all applicable legal requirements. We state that 
                    although acceptance of advertisements on the website is subject to our terms and 
                    conditions which are available on request, we do not accept liability in respect of 
                    any advertisements made on our website.
                </li>
                <li>
                    Whilst we exercise utmost care and caution, we are not responsible for any errors, 
                    omissions or representations on any of our pages or on any links on any of our pages. 
                    We do not make any representations by virtue of the contents of this website in 
                    respect of the existence or availability of any goods and services advertised on our 
                    website. We do not endorse in anyway the goods or services of any advertisers on our 
                    website or any links therefrom. You are requested to kindly verify the veracity of 
                    all information on your own before undertaking any transaction for purchase or use 
                    of such products and services.
                </li>
                <li>
                    We update the information on this website on almost a real time basis. However, we do 
                    not provide any warranties (whether expressed or implied), as to the quality, 
                    accuracy, efficacy, completeness, performance, fitness or any of the contents of the 
                    website, including (but not limited) to any comments, feedback and advertisements 
                    contained within the site.
                </li>
                <li>
                    There could be a loss of data or delay in dissemination of updates due to technical 
                    glitches like a server failure and hacking attack. The company shall not be 
                    responsible in such an event.
                </li>
                <li>
                    We do not make any warranty that the contents of the website are free from infection 
                    by viruses or anything which has or may have contaminating or destructive properties 
                    and we shall have no liability in respect thereof.
                </li>
                <li>
                    Our website contains articles contributed by several individuals and institutions. 
                    The views expressed by and investment recommendations and advice rendered by them, 
                    if any, are exclusively their own and do not represent the views of the website, the 
                    Company or its management nor should they be construed as advice rendered by them.
                </li>
                <li>
                    All linked sites are not under our control and we are not responsible for the 
                    contents of any linked site or any link contained in a linked site, or any changes 
                    or updates to such sites. We are providing these links only as a convenience and 
                    added feature, and the inclusion of any link does not imply endorsement by us of any 
                    of such linked site.
                </li>
                <li>
                    Opinions & views expressed by the Company, or any of its employees, associates, and 
                    website should be solely considered as information and educational content and not 
                    as investment advice. The company, its management or associates are not liable for 
                    losses (if any) incurred due to investments made on the basis of the suggestions 
                    provided on the website.
                </li>
                <li>
                    There are certain risks associated with utilizing short messaging system (“SMS”)/ 
                    email/ notification/whatsapp based information and research services. These services 
                    can fail due to failure of hardware, software, and Internet connection. While we 
                    ensure that the messages are delivered in time to the users/subscribers Mobile 
                    Network, the delivery of these messages to the customer's mobile phone/handset is 
                    the sole responsibility of the customer's Mobile Network and any issues relating to 
                    the same can only be addressed by the customer's Mobile Network, and the website and 
                    the Company cannot be held responsible for.
                </li>
            </ul>
        </p>
    </div>
</div>
@stop