<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.whyMsm.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.whyMsm.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.whenBuilt.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.whenBuilt.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.whyBuilt.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.whyBuilt.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.whoBuilt.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.whoBuilt.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.whatPurpose.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.whatPurpose.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.otherMonuments.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.otherMonuments.answer')) ?>
            }
        }, {
            "@type": "Question",
            "name": <?= json_encode(t('nutshell.howLong.question')) ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?= json_encode(t('nutshell.howLong.answer')) ?>
            }
        }]
    }
</script>