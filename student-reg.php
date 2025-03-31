<?php

/**
 * Template Name: Register Learner
 */

get_header();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $wpdb;

    // Sanitize Inputs
    $name = sanitize_text_field($_POST['name']);
    $surname = sanitize_text_field($_POST['surname']);
    $id_number = sanitize_text_field($_POST['id_number']);
    $dob = sanitize_text_field($_POST['dob']);
    $age = sanitize_text_field($_POST['age']);
    $contact = sanitize_text_field($_POST['contact']);
    $email = sanitize_email($_POST['email']);
    $address = sanitize_textarea_field($_POST['address']);

    // Next of Kin
    $kin_name = sanitize_text_field($_POST['kin_name']);
    $kin_surname = sanitize_text_field($_POST['kin_surname']);
    $kin_contact = sanitize_text_field($_POST['kin_contact']);
    $kin_relation = sanitize_text_field($_POST['kin_relation']);

    // Account Info
    $acc_name = sanitize_text_field($_POST['acc_name']);
    $acc_surname = sanitize_text_field($_POST['acc_surname']);
    $acc_contact = sanitize_text_field($_POST['acc_contact']);
    $acc_email = sanitize_email($_POST['acc_email']);
    $acc_address = sanitize_textarea_field($_POST['acc_address']);

    // Education
    $education = sanitize_text_field($_POST['education']);

    // Insert into Database
    $wpdb->insert(
        $wpdb->prefix . 'students',
        compact(
            'name',
            'surname',
            'id_number',
            'dob',
            'age',
            'contact',
            'email',
            'address',
            'kin_name',
            'kin_surname',
            'kin_contact',
            'kin_relation',
            'acc_name',
            'acc_surname',
            'acc_contact',
            'acc_email',
            'acc_address',
            'education'
        )
    );

    echo "<p class='text-green-600 text-center font-bold'>Registration successful!</p>";
}
?>
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div>
        <p>Student Registration</p>
        <h3 class="fw-bold">Coming Soon</h3>
    </div>
</div>
<div class="hidden flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Student Registration</h2>

        <form id="multiStepForm" method="POST">
            <!-- Step 1: Personal Info -->
            <div class="step" id="step1">
                <h3 class="text-lg font-semibold text-gray-700">Personal Information</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <input type="text" name="name" placeholder="First Name" required class="p-2 border rounded-lg w-full">
                    <input type="text" name="surname" placeholder="Surname" required class="p-2 border rounded-lg w-full">
                    <input type="text" name="id_number" placeholder="ID Number" required class="p-2 border rounded-lg w-full">
                    <input type="date" name="dob" placeholder="Date of Birth" required class="p-2 border rounded-lg w-full">
                    <input type="number" name="age" placeholder="Age" required class="p-2 border rounded-lg w-full">
                    <input type="text" name="contact" placeholder="Contact Number" required class="p-2 border rounded-lg w-full">
                    <input type="email" name="email" placeholder="Email Address" required class="p-2 border rounded-lg w-full">
                    <textarea name="address" placeholder="Home Address" class="p-2 border rounded-lg w-full"></textarea>
                </div>
                <button type="button" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2: Next of Kin -->
            <div class="step hidden" id="step2">
                <h3 class="text-lg font-semibold text-gray-700">Next of Kin</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <input type="text" name="kin_name" placeholder="First Name" class="p-2 border rounded-lg w-full">
                    <input type="text" name="kin_surname" placeholder="Surname" class="p-2 border rounded-lg w-full">
                    <input type="text" name="kin_contact" placeholder="Contact Number" class="p-2 border rounded-lg w-full">
                    <input type="text" name="kin_relation" placeholder="Relation" class="p-2 border rounded-lg w-full">
                </div>
                <button type="button" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded-lg" onclick="prevStep()">Back</button>
                <button type="button" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3: Account Info -->
            <div class="step hidden" id="step3">
                <h3 class="text-lg font-semibold text-gray-700">Account Information</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <input type="text" name="acc_name" placeholder="First Name" class="p-2 border rounded-lg w-full">
                    <input type="text" name="acc_surname" placeholder="Surname" class="p-2 border rounded-lg w-full">
                    <input type="text" name="acc_contact" placeholder="Contact Number" class="p-2 border rounded-lg w-full">
                    <input type="email" name="acc_email" placeholder="Email Address" class="p-2 border rounded-lg w-full">
                    <textarea name="acc_address" placeholder="Billing Address" class="p-2 border rounded-lg w-full"></textarea>
                </div>
                <button type="button" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded-lg" onclick="prevStep()">Back</button>
                <button type="button" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 4: Education -->
            <div class="step hidden" id="step4">
                <h3 class="text-lg font-semibold text-gray-700">Education</h3>
                <input type="text" name="education" placeholder="Education Level" class="p-2 border rounded-lg w-full mt-4">
                <button type="button" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded-lg" onclick="prevStep()">Back</button>
                <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');

    function nextStep() {
        steps[currentStep].classList.add('hidden');
        currentStep++;
        steps[currentStep].classList.remove('hidden');
    }

    function prevStep() {
        steps[currentStep].classList.add('hidden');
        currentStep--;
        steps[currentStep].classList.remove('hidden');
    }
</script>

<?php get_footer(); ?>