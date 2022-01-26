<section>
    <form action="../public/save.php" method="POST">
        <div>
            <label for="name">Votre nom: </label>
            <input type="text" name="name" id="name" required maxlength="25">
        </div>
        <div>
            <label for="message">Votre message: </label>
            <textarea id="message" name="message" required maxlength="500"></textarea>
        </div>
        <div>
            <input type="submit" id="submit">
        </div>
    </form>
</section>