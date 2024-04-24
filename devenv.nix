{
  pkgs,
  lib,
  config,
  inputs,
  ...
}: {
  cachix.enable = false;

  # https://devenv.sh/packages/
  packages = with pkgs; [git phpactor tailwindcss-language-server];

  languages.nix.enable = true;
  # https://devenv.sh/scripts/
  services.mysql = {
    enable = true;
    initialDatabases = [
      {
        name = "app";
      }
    ];
    ensureUsers = [
      {
        name = "app";
        password = "app";
        ensurePermissions = {"app.*" = "ALL PRIVILEGES";};
      }
    ];
  };
  languages.php = {
    enable = true;
    ini = ''
      memory_limit = 256M
    '';
    fpm.pools.web = {
      settings = {
        "pm" = "dynamic";
        "pm.max_children" = 5;
        "pm.start_servers" = 2;
        "pm.min_spare_servers" = 1;
        "pm.max_spare_servers" = 5;
      };
    };
  };

  services.caddy.enable = true;
  services.caddy.virtualHosts."http://localhost:8000" = {
    extraConfig = ''
      root * src
      php_fastcgi unix/${config.languages.php.fpm.pools.web.socket}
      file_server
    '';
  };
}
