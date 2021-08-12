<template>
    <div>
        <Head title="Event" />
        <hero :event="currentevent"></hero>

        <div class="container max-w-7xl mx-auto">
            <div class="leading-loose mt-16  space-x-4 px-4 grid gap-x-4 grid-cols-1 md:grid-cols-3">
                <div class="" id="why-you-should-join">
                    <h4 class="text-4xl my-8">Why you Should Join Event</h4>
                    <p class="my-8 text-justify ">Hands down the quickest way to make a lot of money from home (well, without breaking the law). Lots of persons have genuinely made $100s from this technique. It's completely legal, risk free, tax free, and anyone over 18 can do it</p>
                    <Link :href="route('register')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                    Buy Ticket
                    </Link>
                </div>
                <div class="col-span-2 grid m-0 space-x-4 mx-auto grid-cols-1 md:grid-cols-2">
                    <div class="shadow-lg m-8 px-8">
                        <h4 class="text-xl font-bold">Be Your Own Boss</h4>
                        <p>Get Ideas on how to Manage your time schedule, resources, plan and make decisions on your own with no work pressure or interference.</p>
                    </div>
                    <div class="shadow-lg m-8 px-8">
                        <h4 class="text-xl font-bold">Work at your convenience</h4>
                        <p>Decide when, where, and how you would want your work to be. Working from home gives you all the absolute convenience you need.</p>
                        
                    </div>
                    <div class="shadow-lg m-8 px-8">
                        <h4 class="text-xl font-bold">Learn Amazing Easy Skills</h4>
                        <p>With little or no computer knowledge, attend and learn easy skills you can use to make money daily.</p>
                    </div>
                    <div class="shadow-lg m-8 px-8">
                        <h4 class="text-xl font-bold">Earn Always</h4>
                        <p>Do you want to earn money always, attend for proper guide and mentorship.</p>
                    </div>
                </div>       
            </div>

            <div class="container mx-auto px-4" id="speakers">
                <h3 class="text-4xl my-8 text-center">Speakers</h3>
                <div class="flex justify-center flex-wrap space-x-8 ">
                    <div>
                        <div class="w-48 h-48 relative mb-4">
                            <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                              <span class="hidden group-hover:table-cell text-white font-bold align-middle">KR</span>
                              <img src="/images/ibrahim-bossan.jpg" alt="event speaker" class="object-cover object-center w-full h-full visible group-hover:hidden" />
                            </div>
                        </div>
                        <h3 class="font-bold text-center ">Ibrahim Bossan</h3>
                        <p class="text-center">Web/Graphics Designer</p>
                    </div>

                    <div>
                        <div class="w-48 h-48 relative mb-4">
                            <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                              <span class="hidden group-hover:table-cell text-white font-bold align-middle">KR</span>
                              <img src="/images/eucharia.jpg" alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden" />
                            </div>
                        </div>
                        <h3 class="font-bold text-center ">Odida Eucharia</h3>
                        <p class="text-center">Model/Internetpreneur</p>
                    </div>

                    <div>
                        <div class="w-48 h-48 relative mb-4">
                            <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                              <span class="hidden group-hover:table-cell text-white font-bold align-middle">KR</span>
                              <img src="/images/gabriel-martins.jpg" alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden" />
                            </div>
                        </div>
                        <h3 class="font-bold text-center ">Gabriel Martins</h3>
                        <p class="text-center">e-business consultant/ <br> Internetpreneur</p>
                    </div>


                    <div>
                        <div class="w-48 h-48 relative mb-4">
                            <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                              <span class="hidden group-hover:table-cell text-white font-bold align-middle">KR</span>
                              <img src="/images/success.jpg" alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden" />
                            </div>
                        </div>
                        <h3 class="font-bold text-center ">Success David</h3>
                        <p class="text-center">Web Developer</p>
                    </div>
                </div>
            </div>

            <div class="my-24 px-8 container leading-loose" id="about-the-programme">
                <div>
                    <h4 class="text-center text-4xl mb-4">About the Programme</h4>
                    <p class="text-justify">There’s less than {{daysRemaining()}} to go until our {{currentevent.name}} event and for those of you yet to sign up, here are key reasons to attend that we hope will tempt you into saving your seat/online space at this 'not-to-be-missed' event.</p>
                    <p class="text-justify">Our world today is undeniably digital. New technologies – from social media and GPS systems to Artificial Intelligence and digital twins – make the planet we inhabit unrecognisable from even 20 years ago, all these has led to new innovations and providing new ways of making money daily, in our today's world you can earn even while you sleep. Definitely you must have heard of terms like bitcoin mining, crypto-trading, youtube, forex trading, google adsense, facebook and even digital marketing all from the comfort of your home. Have you ever wondered how online comedians and content creators make their fortune? would you like to find out? that's exactly what this program is meant for. I have worked from home every day for over 3 years. I love it, and I want to share it with you. What if I told you that this program will not only tell you about the new ways of earning, but will provide you with a platform to learn and earn with a clear road map to a successful and comfortable career.</p>
                </div>

                <ol class="mt-4 list-decimal">
                    <li class="text-justify"><strong>All sessions are live </strong> – Not only is our agenda designed to be time efficient, but all sessions are carried out live to ensure you get the most from your conference experience. Whether that means engaging with speakers, or networking with other attendees, you won’t be stuck watching a pre-recorded session, your experience will be in real time. That said, we will provide access to session recordings post-event, so you can catch up on anything you may have missed!</li>
                    <li class="text-justify">
                        <strong>Actionable insights and takeaways</strong> – Our agenda is jam-packed with interesting discussion topics to be delivered by knowledgeable speakers and is tailored to provide you with information you can go away and actually apply! From best practices, to live demos of game-changing technology, and even experts’ notes from the field, there’s something for everyone.
                    </li>
                </ol>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 my-8" id="contacts">
                <div class="bg-yellow-700 p-8 md:mx-12 text-white"><a class="text-2xl text-white font-bold" href="mailto:m.bluth@example.com">Email: event@stechmax.com</a></div>
                <div class="bg-purple-600 font-bold p-8 md:mx-12 text-2xl text-white">Help Line: +234-705-2539-151</div>
            </div>
            <div class="my-24 px-8 container leading-loose" id="who we are">
                    <h4 class="text-center text-4xl mb-4">Who we are</h4>
                <p>Since 2013, Success Computers now known as Success Techmax has grown to become the #1 IT Training Company within her local. We offer much more than just IT. We offer Business Technology Solutions. 
Our IT & Business Solutions help your start-up businesses and company keep up with the innovative trends in your industry, making your business more adaptable and therefore more competitive. </p>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@/Layouts/Layout.vue'
import Hero from '@/Components/WelcomeHero.vue'
import moment from 'moment'

export default {
    layout: Layout,
    components: {
      Head,
      Link,
      Hero
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        events: Object,
        currentevent: Object,
    },

    methods: {
        eventdate() {
          return moment(this.currentevent.event_date).format('MMMM Do YYYY')
        },

        daysRemaining() {
             return moment().to(moment(this.currentevent.event_date))
        }
    }
}
</script>
