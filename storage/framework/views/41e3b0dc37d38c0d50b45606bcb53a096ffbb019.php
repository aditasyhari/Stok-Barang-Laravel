<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="<?php echo e((request()->is('dashboard/dashboard')) ? 'active' : ''); ?>">
            <a href="/dashboard/dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="<?php echo e((request()->is('data_transaksi/data_transaksi')) ? 'active' : ''); ?>">
            <a href="/data_transaksi/data_transaksi">
              <i class="nc-icon nc-bank"></i>
              <p>Data Transaksi</p>
            </a>
          </li>
          <li class="<?php echo e((request()->is('stok/stok_barang')) ? 'active' : ''); ?>">
            <a href="/stok/stok_barang">
              <i class="nc-icon nc-diamond"></i>
              <p>Stok Barang</p>
            </a>
          </li>
          <li class="<?php echo e((request()->is('keuangan/data_pembeli')) ? 'active' : ''); ?>">
            <a href="/keuangan/data_pembeli">
              <i class="nc-icon nc-diamond"></i>
              <p>Data Pembeli</p>
            </a>
          </li>
          <li class="<?php echo e((request()->is('kasir/kasir')) ? 'active' : ''); ?>">
            <a href="/kasir/kasir">
              <i class="nc-icon nc-pin-3"></i>
              <p>Pembelian</p>
            </a>
          </li>
          <?php if(Auth()->user()->id == 3): ?>
          <li class="<?php echo e((request()->is('sekertaris')) ? 'active' : ''); ?>">
            <a href="/sekertaris">
              <i class="nc-icon nc-bell-55"></i>
              <p>Sekertaris</p>
            </a>
          </li>
          <?php endif; ?>
          <!-- <li>
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="nc-icon nc-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div><?php /**PATH E:\stok_barang_laravel-main\resources\views/layouts/menu.blade.php ENDPATH**/ ?>