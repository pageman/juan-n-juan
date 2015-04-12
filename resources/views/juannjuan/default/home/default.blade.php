@extends('juannjuan.default.home')

@section('body')
  <div class="bgvid-append">
    <section class="section--splash">
      <h2 class="sr-only">Juan N Juan &mdash; Connected N _______.</h2>
      <div>
        <div class="jumbotron">
          <div class="container">
            <p class="h1">Juan <span class="brand--logo">N</span> Juan</p>
            <p class="h2">Free and fast one-on-one video calling with your peers and loved ones, here and abroad.</p>
            <div class="view__cta">
              @if(Auth::check())
                @if(\CoreProc\JuanNJuan\Channel::all()->count() > 0)
                <a class="btn btn-primary btn-lg" href="{{ url('channels') }}">
                  <i class="fa fa-search"></i>Find Channels
                </a>@endif <a class="btn btn-primary btn-lg" href="#" data-ng-click="homeCtrl.openNewChannelModal()">
                  <i class="fa fa-comments"></i>Create Channel
                </a>
              @else
                <p class="lead">
                  Connect with
                </p>
                <a class="btn btn-primary" href="{{ url('oauth/facebook') }}">
                  <i class="fa fa-facebook-square"></i> Facebook
                </a><a class="btn btn-primary" href="{{ url('oauth/twitter') }}">
                  <i class="fa fa-twitter-square"></i> Twitter
                </a>
              @endif
            </div>
            <div>
              @if(Auth::check())
              <a href="{{ url('auth/logout') }}">Log out</a> |
              @endif
              <a href="#terms" data-toggle="modal">Terms and Conditions</a> |
              <a href="#privacy" data-toggle="modal">Privacy Policy</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <video autoplay loop poster="{{ asset('img/jnj.jpg') }}" id="bgvid">
      <source src="{{ asset('video/bg-movie.webm') }}" type="video/webm">
      <source src="{{ asset('video/bg-movie.mp4') }}" type="video/mp4">
    </video>
  </div>
@stop

@section('modals')
  @parent

  <div class="modal fade" id="privacy">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title h4">Privacy Policy of Use of Juan N Juan</h2>
        </div>
        <div class="modal-body">
          <p>This Privacy Policy governs the manner in which Juan N Juan collects, uses, maintains and discloses information collected from users (each, a "User") of the Juan N Juan website and mobile application ("Service"). This privacy policy applies to the Service and all products and services offered by Juan N Juan.</p>
          <h3>Personal identification information</h3>
          <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our service, register on the service, fill out a form and in connection with other activities, services, features or resources we make available on our Service. Users may be asked for, as appropriate, name, email address,</p>
          <p>We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Service related activities.</p>
          <h3>Non-personal identification information</h3>
          <p>We may collect non-personal identification information about Users whenever they interact with our Service. Non-personal identification information may include the browser name, the type of computer or phone and technical information about Users means of connection to our Service, such as the operating system and the Internet service providers utilized and other similar information.</p>
          <h3>Web browser cookies</h3>
          <p>Our Service may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Service may not function properly.</p>
          <h3>How we use collected information</h3>
          <p>Juan N Juan collects and uses Users personal information for the following purposes:</p>
          <ul>
            <li>To improve customer service</li>
            <li>Your information helps us to more effectively respond to your customer service requests and support needs.</li>
            <li>To improve our Service</li>
            <li>We continually strive to improve our website offerings based on the information and feedback we receive from you.</li>
            <li>To administer a content, promotion, survey or other Service feature</li>
            <li>To send Users information they agreed to receive about topics we think will be of interest to them.</li>
          </ul>
          <h3>How we protect your information</h3>
          <p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Service.</p>
          <h3>Third party websites</h3>
          <p>Users may find advertising or other content on our Service that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Service, is subject to that website’s own terms and policies.</p>
          <h3>Changes to this privacy policy</h3>
          <p>Juan N Juan has the discretion to update this privacy policy at any time. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>
          <h3>Your acceptance of these terms</h3>
          <p>By using this Service, you signify your acceptance of this policy and terms and conditions. If you do not agree to this policy, please do not use our Service. Your continued use of the Service following the posting of changes to this policy will be deemed your acceptance of those changes.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script>
    $(function() {
      $("#modal-privacy")
        .modal({
          size: "lg"
        });
    });
  </script>

  <div class="modal fade" id="terms">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title h4">Terms and Conditions of Use of Juan N Juan</h2>
        </div>
        <div class="modal-body">
          <h3>Acceptance of Terms and Conditions</h3>

          <p>Your access to and use of Juan N Juan is subject exclusively to these Terms and Conditions. You will not use the website and mobile application (“Service”) for any purpose that is unlawful or prohibited by these Terms and Conditions. By using the Service you are fully accepting the terms, conditions and disclaimers contained in this notice. If you do not accept these Terms and Conditions you must immediately stop using the Service.</p>

          <h3>Credit card details</h3>

          <p>Juan N Juan will never ask for Credit Card details and request that you do not enter it on any of the forms on Juan N Juan.</p>

          <h3>Advice</h3>

          <p>The contents of Juan N Juan website do not constitute advice and should not be relied upon in making or refraining from making, any decision.</p>

          <h3>Change of Use</h3>

          <p>Juan N Juan reserves the right to:</p>

          <ul>
            <li>Change or remove (temporarily or permanently) the Service or any part of it without notice and you confirm that Juan N Juan shall not be liable to you for any such change or removal and</li>

            <li>Change these Terms and Conditions at any time, and your continued use of the Service following any changes shall be deemed to be your acceptance of such change.</li>
          </ul>

          <h3>Links to Third Party Websites</h3>

          <p>Juan N Juan Service may include links to third party websites that are controlled and maintained by others. Any link to other websites is not an endorsement of such websites and you acknowledge and agree that we are not responsible for the content or availability of any such sites.</p>

          <h3>Copyright</h3>

          <p>All copyright, trade marks and all other intellectual property rights in the Service and its content (including without limitation the Service design, text, graphics and all software and source codes connected with the Service) are owned by or licensed to Juan N Juan or otherwise used by Juan N Juan as permitted by law.</p>

          <p>In accessing the Service you agree that you will access the content solely for your personal, non-commercial use. None of the content may be downloaded, copied, reproduced, transmitted, stored, sold or distributed without the prior written consent of the copyright holder. This excludes the downloading, copying and/or printing of pages of the Service for personal, non-commercial home use only.</p>

          <h3>Disclaimers and Limitation of Liability</h3>

          <p>The Service is provided on an AS IS and AS AVAILABLE basis without any representation or endorsement made and without warranty of any kind whether express or implied, including but not limited to the implied warranties of satisfactory quality, fitness for a particular purpose, non-infringement, compatibility, security and accuracy.</p>

          <p>To the extent permitted by law, Juan N Juan will not be liable for any indirect or consequential loss or damage whatever (including without limitation loss of business, opportunity, data, profits) arising out of or in connection with the use of the Service.</p>

          <p>Juan N Juan makes no warranty that the functionality of the Service will be uninterrupted or error free, that defects will be corrected or that the Service or the server that makes it available are free of viruses or anything else which may be harmful or destructive.</p>

          <p>Nothing in these Terms and Conditions shall be construed so as to exclude or limit the liability of Juan N Juan for death or personal injury as a result of the negligence of Juan N Juan or that of its employees or agents.</p>

          <h3>Indemnity</h3>

          <p>You agree to indemnify and hold Juan N Juan and its employees and agents harmless from and against all liabilities, legal fees, damages, losses, costs and other expenses in relation to any claims or actions brought against Juan N Juan arising out of any breach by you of these Terms and Conditions or other liabilities arising out of your use of this Service.</p>

          <h3>Severance</h3>

          <p>If any of these Terms and Conditions should be determined to be invalid, illegal or unenforceable for any reason by any court of competent jurisdiction then such Term or Condition shall be severed and the remaining Terms and Conditions shall survive and remain in full force and effect and continue to be binding and enforceable.</p>

          <h3>Governing Law</h3>

          <p>These Terms and Conditions shall be governed by and construed in accordance with the law of Philippines and you hereby submit to the exclusive jurisdiction of the Philippine courts.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@stop
