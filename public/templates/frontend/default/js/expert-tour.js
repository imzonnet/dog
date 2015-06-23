/**
 * Created by John Nguyen on 12-05-2015.
 */

// Instance the tour
var tour = new Tour({
    steps: [
        {
            path: '/expert',
            element: "#wrapper",
            title: "Welcome to the Dashboard",
            content: "In a few simple steps, we will show you how to use the expert portal",
            placement: "top"
        },
        {
            path: '/expert',
            element: "#upcoming-appointments",
            title: "Showing Upcoming Appointments",
            content: "This is your dashboard. Here you can view and manage upcoming appointments.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert',
            element: "#profile-photo",
            title: "Change profile picture",
            content: "Here is a quickview of your profile. Upload a great profile picture to get more business!",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert',
            element: "#profile-completeness",
            title: "Profile Completeness",
            content: "This shows your profile completeness. Verify yourself to gain a better ranking.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/profile',
            element: "#profile-overview",
            title: "Profile Overview",
            content: "This is the profile page where you tell the world about your experience and the advice you can give.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/profile',
            element: "#profile-specialities",
            title: "Profile Specialities",
            content: "Add specialties here so customers can find you easily.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/rate-availability',
            element: "#profile-schedule",
            title: "Fee Schedule",
            content: "The Rate & Availability page allows you to edit the fees that you charge per session.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/rate-availability',
            element: "#schedule-available",
            title: "Availability",
            content: "Pick your availability below on each day so that you can start accepting bookings from users around the world. (pick the correct timezone)",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/postinsight',
            element: "#post-insights",
            title: "Post Insights",
            content: "Insights is where you tell the world something unique, knowledgeable or insightful. In return, rank higher and get more appointments.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/payment-setting',
            element: "#payment-setting",
            title: "Payment Setting",
            content: "Want to get paid? Remember to complete the PayPal section here so we can transfer your session revenue to you.",
            placement: "top",
            backdrop: true
        },
        {
            path: '/expert/personal-setting',
            element: "#personal-setting",
            title: "Personal Setting",
            content: "Lastly, update your details here at any time. If you wish to receive SMS reminders, add a mobile number to your profile.",
            placement: "top",
            backdrop: true
        },
    ]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();