<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    $faqs = $db->select("SELECT question, answer FROM faqs WHERE status = 1");
    $count = 1;
?>
<div class="container">
    <h3 class="text-primary my-4">Frequently Asked Questions</h3>
    <?php while($faq = $faqs->fetch_assoc()){ ?>
    <div class="faq">
        <h6 class="text-light bg-primary px-3 py-2"><strong>Question <?php echo $count; ?>:</strong> <?php echo $faq['question']; ?></h6>
        <p class="bg-navbar text-justify px-3 py-2"><strong>Answer:</strong> <?php echo $faq['answer']; ?></p>
    </div>
    <hr>
   <?php $count++; } ?>
</div>
<?php include 'footer.php'; ?>