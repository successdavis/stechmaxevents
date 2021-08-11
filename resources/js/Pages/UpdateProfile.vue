<template>
	<Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
    	<div class="container max-w-7xl mx-auto py-6">

			<div>
			  <div class="md:grid md:grid-cols-3 md:gap-6">
			    <div class="md:col-span-1">
			      <div class="px-4 sm:px-0">
			        <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
			        <p class="mt-1 text-sm text-gray-600">
			          Fill in the form.
			        </p>
			      </div>
			    </div>
			    <div class="mt-5 md:mt-0 md:col-span-2">
			      <form action="#" method="POST">
			        <div class="shadow sm:rounded-md sm:overflow-hidden">
			          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
			            <div class="grid grid-cols-3 gap-6">
			              <div class="col-span-3 sm:col-span-2">
			                <label for="company-website" class="block text-sm font-medium text-gray-700">
			                  Website (optional)
			                </label>
			                <div class="mt-1 flex rounded-md shadow-sm">
			                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
			                    http://
			                  </span>
			                  <input v-model="Profile.website" type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">

			                </div>
		                        <p v-if="Profile.errors.has('website')" v-text="Profile.errors.get('website')" class="text-red-200	"></p>
			              </div>
			            </div>

			            <div>
			              <label for="about" class="block text-sm font-medium text-gray-700">
			                About
			              </label>
			              <div class="mt-1">
			                <textarea v-model="Profile.about" id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
			              </div>
			              <p class="mt-2 text-sm text-gray-500">
			                Brief description for your profile. (Keep it really brief)

	                        <p v-if="Profile.errors.has('about')" v-text="Profile.errors.get('about')" class="text-red-200	"></p>
			              </p>
			            </div>

			            <div>
			              <label class="block text-sm font-medium text-gray-700">
			                Photo
			              </label>
			              <div class="mt-1 flex items-center">

			                <!-- <div class="flex w-full items-center justify-center bg-grey-lighter">
							    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
							        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
							        </svg>
							        <span class="mt-2 text-base leading-normal">Select a file</span>
							        <input type='file' class="hidden" />
							    </label>
							</div> -->

							<avatar :user="user"></avatar>



			              </div>
			            </div>

			          </div>
			          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
			            <button @click.prevent="saveProfile" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
			            	<!-- <svg :class="Profile.processing ? 'animate-spin' : '' " class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24"></svg> -->
			            	  <div v-show="Profile.processing" :class="Profile.processing ? 'animate-spin' : '' " class="rounded-full h-5 w-5 border-t-2 border-b-2 border-purple-500"></div>
			              Save
			            </button>
			          </div>
			        </div>
			      </form>
			    </div>
			  </div>
			</div>

			<div class="hidden sm:block" aria-hidden="true">
			  <div class="py-5">
			    <div class="border-t border-gray-200"></div>
			  </div>
			</div>

			<div class="mt-10 sm:mt-0">
			  <div class="md:grid md:grid-cols-3 md:gap-6">
			    <div class="md:col-span-1">
			      <div class="px-4 sm:px-0">
			        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
			        <p class="mt-1 text-sm text-gray-600">
			          Use a permanent address where you can receive mail.
			        </p>
			      </div>
			    </div>
			    <div class="mt-5 md:mt-0 md:col-span-2">
			      <form action="#" method="POST">
			        <div class="shadow overflow-hidden sm:rounded-md">
			          <div class="px-4 py-5 bg-white sm:p-6">
			            <div class="grid grid-cols-6 gap-6">
			              <div class="col-span-6 ">
			                <label for="last-name" class="block text-sm font-medium text-gray-700">Fullname</label>
			                <input v-model="Personalinformation.fullname" type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              </div>

			              <div class="col-span-6 sm:col-span-4">
			                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
			                <input disabled="true" :value="user.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              </div>
			              <div class="col-span-6 sm:col-span-4">
			                <label for="email-address" class="block text-sm font-medium text-gray-700">Phone Number</label>
			                <input v-model="Personalinformation.phone" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              <p class="col-span-6 mt-2 text-sm text-gray-500">
			                Prefix your country code e.g. +2349050635733
			              </p>
			              </div>
			              <div class="col-span-6 sm:col-span-4">
			                <label for="email-address" class="block text-sm font-medium text-gray-700">Date of Birth</label>
			                <input v-model="Personalinformation.dob" type="date" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              <p class="col-span-6 mt-2 text-sm text-gray-500">
			                Prefix your country code e.g. +2349050635733
			              </p>
			              </div>

			              <div class="col-span-6 sm:col-span-3">
			                <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
			                <select v-model="Personalinformation.country" id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
			                  <option value="">Select a Country</option>
			                  <option :value="country.id" v-for="country in countries">{{country.country_name}}</option>
			                </select>
			              </div>

			              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
			                <label  for="city" class="block text-sm font-medium text-gray-700">City</label>
			                <input v-model="Personalinformation.city" type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              </div>

			              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
			                <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
			                <input v-model="Personalinformation.state" type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              </div>

			              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
			                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
			                <input v-model="Personalinformation.postal" type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
			              </div>
			            </div>
			          </div>
			          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
			            <button @click.prevent="savePersonalInformation" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

		            	  <div v-show="Personalinformation.processing" :class="Profile.processing ? 'animate-spin' : '' " class="rounded-full h-5 w-5 border-t-2 border-b-2 border-purple-500"></div>
			              Save
			            </button>
			          </div>
			        </div>
			      </form>
			    </div>
			  </div>
			</div>

			<div class="hidden sm:block" aria-hidden="true">
			  <div class="py-5">
			    <div class="border-t border-gray-200"></div>
			  </div>
			</div>

			<div class="mt-10 sm:mt-0">
			  <div class="md:grid md:grid-cols-3 md:gap-6">
			    <div class="md:col-span-1">
			      <div class="px-4 sm:px-0">
			        <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
			        <p class="mt-1 text-sm text-gray-600">
			          Decide which communications you'd like to receive and how.
			        </p>
			      </div>
			    </div>
			    <div class="mt-5 md:mt-0 md:col-span-2">
			      <form action="#" method="POST">
			        <div class="shadow overflow-hidden sm:rounded-md">
			          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
			            <fieldset>
			              <legend class="text-base font-medium text-gray-900">By Email</legend>
			              <div class="mt-4 space-y-4">
			                <div class="flex items-start">
			                  <div class="flex items-center h-5">
			                    <input v-model="Notification.newsnotification" id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
			                  </div>
			                  <div class="ml-3 text-sm">
			                    <label for="comments" class="font-medium text-gray-700">Newsletter</label>
			                    <p class="text-gray-500">Get notified with our newsletter and promotional mails. Don't misss anything out</p>
			                  </div>
			                </div>
			                <div class="flex items-start">
			                  <div class="flex items-center h-5">
			                    <input v-model="Notification.eventnotification" id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
			                  </div>
			                  <div class="ml-3 text-sm">
			                    <label for="candidates" class="font-medium text-gray-700">Events </label>
			                    <p class="text-gray-500">Get notified with emails related to your events and future events.</p>
			                  </div>
			                </div>
			              </div>
			            </fieldset>
			          </div>
			          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
			            <button @click.prevent="saveNotificationsSettings" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

		            	  <div v-show="Notification.processing" :class="Profile.processing ? 'animate-spin' : '' " class="rounded-full h-5 w-5 border-t-2 border-b-2 border-purple-500"></div>

			              Save
			            </button>
			          </div>
			        </div>
			      </form>
			    </div>
			  </div>
			</div>

    	</div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { computed } from 'vue'
import { Head, Link, usePage  } from '@inertiajs/inertia-vue3';
import avatar from '@/components/AvatarForm.vue';

	export default {
		setup() {
		    const user = computed(() => usePage().props.value.auth.user)
		    return { user }
	  	},
		components: {
	        BreezeAuthenticatedLayout,
	        Head,
	        Link,
	        avatar
	    },

		data () {
			return {
				countries: [],
				Profile: new Form({
					website: this.user.website,
					about: this.user.about,
					processing: false,
				}),

				Personalinformation: new Form({
					processing: false,
					fullname: this.user.name,
					phone: this.user.phone,
					country: this.user.country_id,
					state: this.user.state,
					city: this.user.city,
					postal: this.user.postal,
					dob: this.user.dob,
				}),

				Notification: new Form({
					processing: false,
					newsnotification: this.user.newsletter_notification,
					eventnotification:this.user.events_notification,
				})
			}
		},

		created() {
			axios.get('/countries')
			.then((response) => {
			  this.countries = response.data;
			}).catch((error) => {
			  console.log(error)
			})
		},

		methods: {
			saveProfile() {
				this.Profile.processing = true;
				this.Profile.post('/updateprofile/save')
				.then((data) => {
					console.log(data);
					this.Profile.processing = false;
				})
				.catch((error) => {
					console.log(error);
					this.Profile.processing = false;
				})
			},

			savePersonalInformation() {
				this.Personalinformation.processing = true
				this.Personalinformation.post('/update-personal-information')
				.then((data) => {
					this.Personalinformation.processing = false
				})
				.catch((data) => {
					this.Personalinformation.processing = false
				})
			},

			saveNotificationsSettings() {
				this.Notification.processing = true
				this.Notification.post('/notification-settings')
				.then(() => {
					this.Notification.processing = true

				})
				.catch(() => {
					this.Notification.processing = true
				})
			}
		}
	}
</script>