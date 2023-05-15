<?php
include('common/header.php');
?>

<div class="flex flex-col">
    <div class=" mt-24">
        <h1 class="text-6xl font-['Verdana'] text-center font-bold">Terms & Condition</h1>
        <div class="flex flex-col mt-10 mx-20 p-20 px-20 drop-shadow-lg w-[90%] bg-white">
            <p class="text-lg font-['Verdana'] text-justify mb-5 px-12">
                Please read these Terms and Conditions carefully. By accessing, browsing, or using Remi-Education.com (the “Site”),
                you acknowledge what you have read, understood and agree to be bound by the Terms and Conditions.
                If you do not agree to be bound by the Terms and Conditions, you should discontinue your use or access to this Site.
            </p>
            <br>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">
                Account security
            </p>
            <p class="text-lg font-['Verdana'] text-justify">
                You have access to and control over your Remi education account and the devices used to access the Service as the creator of your Remi education account.
                To keep control of your account and prevent unauthorised access,
                you should keep control of the devices used to access the Service and not expose the password or any payment information (if any) linked with your account to anyone.
                You are responsible for updating and maintaining the correctness of the account information you give to us.
                You are also accountable for preventing unauthorised access to and use of your account by anybody other than yourself.
                We can terminate your account or place your account on hold in order to protect you, Remi education or our partners from conducting or attempting to conduct identity theft or other fraudulent activity.
            </p>
            <br>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">
                Parents and guardians responsibility to safeguard children’s safety
            </p>
            <p class="text-lg font-['Verdana'] text-justify">Remi education provides some Services and Resources that children may use. Children are not considered completely self-sufficient consumers of the Services and Resources.
                It is the duty of the parents/guardians to ensure that the usage of the Remi education Services and Resources is in conformity with the Agreement and to protect the children's safety and privacy.
                Aside from the constraints of how the Services work,
                Remi education has no influence over how parents/guardians supervise their children's usage of the Services since Remi education does not engage directly with the children who use the Services and Resources.</p>
            <br>
        </div>
    </div>
    <div id="disqus_thread" class="px-[16rem] pt-12"></div>
    <div class="top-0 bg-sky-500 w-full mt-20">
        <?php
        include('common/footer.php');
        ?>
    </div>
</div>
<script>
    var disqus_config = function() {
        this.page.url = "disqus_test.php"; // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "#DISQUS-0001"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://sdp-remi-education.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//sdp-remi-education.disqus.com/count.js" async></script>
</body>

</html>