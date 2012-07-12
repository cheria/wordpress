      </div>
    </div>
    <div id="Footer">
      <ul>
      <!-- 表示したくないページがある場合は、excludeにページIDを追加していく -->
      <?php wp_list_pages('title_li=&exclude=2'); ?>
      </ul>
      <div class="copy">&copy; 2012 Cheria</div>
    </div>
  </div>
<?php wp_footer(); ?>
</body>
</html>