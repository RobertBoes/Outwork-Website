<template>
    <Main>
        <Row header="true">
            <div class="max-w-4xl mx-auto text-center">
                <Heading size="2xl" class="text-center text-heading">About Us</Heading>
                <p class="text-xl max-w-2xl mx-auto text-center mx-12 text-body mb-6">Expertise, efficiency, and
                    cost-effective recruiting solutions as you grow your staff overseas.

                </p>

            </div>
        </Row>
        <Row>

            <Fifty imageLocation="left"
                imageUrl="https://images.ctfassets.net/g7bwetg052e6/1QHGRS519pdeSnWGIX9tA4/081a6d1d816016d0357a8720bfab1be4/people.jpeg"
                altText="Team putting hands in">
                <template #right>
                    <Heading size="span" tag="h6">
                        our mission
                    </Heading>
                    <Heading tag="h2" size="xl">
                        Built specifically for your needs.
                    </Heading>
                    <p class="body-paragraph">
                        Our mission is to provide cost-effective and high-quality solutions to our clients' business
                        staffing needs by leveraging the expertise of our global team of professionals.
                    </p>
                    <CheckBubble :items="['Fixed Hiring Fee', '$0 retainer']" />
                </template>

            </Fifty>
        </Row>
        <Row>
            <Fifty imageLocation="right"
                imageUrl="https://images.ctfassets.net/g7bwetg052e6/evi8IOy7eH7B3deVUBC7i/66dba1b271bdddf28b8233dac1c3b20f/linkedin-sales-solutions-Be5aVKFv9ho-unsplash.jpg"
                altText="Showcased Team">
                <template #left>
                    <Heading size="span" tag="h6">
                        join us!
                    </Heading>
                    <Heading tag="h2" size="xl">
                        Interested in joining our team? 🎉
                    </Heading>
                    <p class="body-paragraph">
                        If you are passionate about helping companies hire internationally, we want to hear from you!
                        <br><br>
                        Please send us a message telling us why you would be a great fit for our team. We are always
                        looking
                        for talented and motivated individuals who are committed to helping companies succeed in a
                        global
                        market.
                    </p>
                    <Button type="text" link="mailto:operations@outworkstaffing.com">Contact Us</Button>

                </template>

            </Fifty>
        </Row>
        <CTA />
    </Main>
</template>